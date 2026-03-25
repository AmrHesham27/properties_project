<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertyImagesSeeder extends Seeder
{
    public function run(): void
    {
        $imagesRoot = database_path('seeders/data/images');
        if (!is_dir($imagesRoot)) {
            $this->command?->warn("Images root folder missing: {$imagesRoot}");
            return;
        }

        $publicBase = public_path('property-images');
        if (!is_dir($publicBase)) {
            mkdir($publicBase, 0775, true);
        }

        $folderPaths = array_filter(glob($imagesRoot . '/*'), static fn ($p) => is_dir($p));
        foreach ($folderPaths as $folderPath) {
            $key = basename($folderPath);

            if ($key === '') {
                continue;
            }

            $property = Property::query()->where('source_key', $key)->first();
            if (!$property) {
                // No DB row for this image folder. Skip.
                continue;
            }

            $pngFiles = glob($folderPath . '/*.png') ?: [];
            // Keep stable order in UI.
            sort($pngFiles, SORT_NATURAL | SORT_FLAG_CASE);

            $destinationDir = $publicBase . DIRECTORY_SEPARATOR . $key;
            if (!is_dir($destinationDir)) {
                mkdir($destinationDir, 0775, true);
            }

            $imageUrls = [];
            foreach ($pngFiles as $filePath) {
                $fileName = basename($filePath);
                $destPath = $destinationDir . DIRECTORY_SEPARATOR . $fileName;

                // Copy file for public serving.
                @copy($filePath, $destPath);

                $imageUrls[] = 'property-images/' . $key . '/' . $fileName;
            }

            $property->image_urls = $imageUrls;
            $property->main_image_url = $imageUrls[0] ?? null;
            $property->save();
        }
    }
}

