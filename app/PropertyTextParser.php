<?php

namespace App;

class PropertyTextParser
{
    public static function parse(string $text): array
    {
        $text = str_replace(["\r\n", "\r"], "\n", $text);
        $text = trim($text);

        $lines = array_map(
            static fn (string $line) => trim($line),
            preg_split('/\n/', $text) ?: []
        );

        $nonEmpty = array_values(array_filter($lines, static fn (string $l) => $l !== ''));

        $locationName = $nonEmpty[0] ?? null;
        $title = $nonEmpty[1] ?? null;

        $bedroomsCount = self::extractFirstInt('/(\d+)\s+Bedrooms/i', $nonEmpty[2] ?? '');
        $fullBathroomsCount = self::extractFirstInt('/(\d+)\s+.*Bathrooms/i', $nonEmpty[3] ?? '');
        $view = $nonEmpty[4] ?? null;

        $petFriendly = false;
        foreach ($nonEmpty as $l) {
            if (preg_match('/Pet[- ]?Friendly/i', $l)) {
                $petFriendly = true;
                break;
            }
        }

        $rentAmount = null;
        $rentPeriod = 'month';
        $rentCurrency = 'GBP';
        foreach ($nonEmpty as $l) {
            if (str_contains($l, '£')) {
                // Example: "£ 20,000 / Month"
                if (preg_match('/£\s*([\d,]+)\s*\/\s*([A-Za-z]+)/', $l, $m)) {
                    $rentAmount = (float) str_replace(',', '', $m[1]);
                    $rentPeriod = strtolower($m[2]);
                }
                break;
            }
        }

        $description = self::extractSectionText($lines, 'Description', 'Highlighted Features', [
            'exclude_exact' => ['Share this property'],
        ]);

        $neighborhood = self::extractSectionText($lines, 'Neighbourhood', 'Getting Around');

        $highlightedFeatures = [];
        $amenities = [];
        $gettingAround = [];

        $highlightedStart = self::indexOfLine($lines, 'Highlighted Features');
        $exploreNeighborhoodIdx = self::indexOfLine($lines, 'Explore the Neighborhood');
        $highlightedEnd = $exploreNeighborhoodIdx !== null ? $exploreNeighborhoodIdx : count($lines);

        $floorNames = ['Lower Ground', 'Ground Floor', 'First Floor', 'Top Floor'];
        $currentFloor = null;
        $highlightedByFloor = [];
        $highlightedUnscoped = [];

        $amenityKeywords = [
            // Cleaning
            'home professionally cleaned',
            'bed linen and towels freshly laundered',
            // Appliances/equipment
            'dishwasher',
            'washing machine',
            'tumble dryer',
            'travel cot',
            'private entrance',
            'cooker',
            'microwave',
            'toaster',
            'kettle',
            'linen',
            'bath',
            'iron and board',
            'hair dryer',
            'shampoo',
            'conditioner',
            'body wash',
            'coffee',
            'cooking basics',
            'fridge and freezer',
            'portable fans',
            'heating',
            'tv',
            'wifi',
            // Balcony/garden is sometimes listed with facilities
            'balcony',
            'terrace',
            'garden',
            'outdoor furniture',
        ];

        for ($i = $highlightedStart !== null ? $highlightedStart + 1 : 0; $i < $highlightedEnd; $i++) {
            $line = $lines[$i] ?? '';
            if ($line === '') {
                continue;
            }

            if (in_array($line, $floorNames, true)) {
                $currentFloor = $line;
                $highlightedByFloor[$currentFloor] ??= [];
                continue;
            }

            if ($currentFloor === null) {
                $highlightedUnscoped[] = $line;
            } else {
                $highlightedByFloor[$currentFloor][] = $line;
            }

            // Amenities extraction (keyword-based): works even when there are no floor labels.
            $lower = mb_strtolower($line);
            foreach ($amenityKeywords as $kw) {
                if (str_contains($lower, $kw)) {
                    $amenities[] = $line;
                    break;
                }
            }
        }

        foreach ($floorNames as $floor) {
            $items = $highlightedByFloor[$floor] ?? [];
            if (count($items) > 0) {
                $highlightedFeatures[] = ['floor' => $floor, 'items' => array_values($items)];
            }
        }

        // If the file doesn't use floor labels, still provide highlighted content.
        if (count($highlightedUnscoped) > 0) {
            $highlightedFeatures[] = [
                'floor' => 'General',
                'items' => array_values($highlightedUnscoped),
            ];
        }

        // De-duplicate amenities while preserving order.
        $amenities = array_values(array_unique($amenities));

        $gettingAroundIdx = self::indexOfLine($lines, 'Getting Around');
        if ($gettingAroundIdx !== null) {
            for ($i = $gettingAroundIdx + 1; $i < count($lines); $i++) {
                $line = $lines[$i] ?? '';
                if ($line === '') {
                    continue;
                }
                if (str_contains($line, '<iframe')) {
                    break;
                }

                // Example: "‣ Sloane Square station is just around the corner, 7 minute walk"
                if (preg_match('/^\s*‣\s*(.+)$/u', $line, $m)) {
                    $gettingAround[] = trim($m[1]);
                    continue;
                }

                $gettingAround[] = $line;
            }
        }

        $mapIframeHtml = null;
        if (preg_match('/<iframe[^>]*>.*?<\\/iframe>/s', $text, $m)) {
            $mapIframeHtml = trim($m[0]);
        }

        return [
            'location_name' => $locationName,
            'title' => $title,
            'bedrooms_count' => $bedroomsCount,
            'full_bathrooms_count' => $fullBathroomsCount,
            'view' => $view,
            'pet_friendly' => $petFriendly,
            'rent_amount' => $rentAmount,
            'rent_currency' => $rentCurrency,
            'rent_period' => $rentPeriod,
            'description' => $description,
            'neighborhood' => $neighborhood,
            'highlighted_features' => $highlightedFeatures,
            'amenities' => $amenities,
            'getting_around' => $gettingAround,
            'map_iframe_html' => $mapIframeHtml,
        ];
    }

    private static function extractFirstInt(string $pattern, string $value): ?int
    {
        if ($value === '') {
            return null;
        }

        if (preg_match($pattern, $value, $m)) {
            return (int) $m[1];
        }

        return null;
    }

    private static function indexOfLine(array $lines, string $needle): ?int
    {
        foreach ($lines as $i => $line) {
            if ($line === $needle) {
                return (int) $i;
            }
        }

        return null;
    }

    private static function extractSectionText(array $lines, string $startNeedle, ?string $endNeedle = null, array $options = []): ?string
    {
        $excludeExact = $options['exclude_exact'] ?? [];

        $startIdx = self::indexOfLine($lines, $startNeedle);
        if ($startIdx === null) {
            return null;
        }

        if ($endNeedle === null) {
            $endIdx = count($lines);
        } else {
            $endIdx = self::indexOfLine($lines, $endNeedle);
            $endIdx = $endIdx === null ? count($lines) : $endIdx;
        }

        $out = [];
        for ($i = $startIdx + 1; $i < $endIdx; $i++) {
            $line = $lines[$i] ?? '';
            if ($line === '' || in_array($line, $excludeExact, true)) {
                continue;
            }
            $out[] = $line;
        }

        $text = trim(implode("\n", $out));

        return $text === '' ? null : $text;
    }
}

