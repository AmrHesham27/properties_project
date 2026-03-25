<?php

namespace Database\Seeders\Properties;

use App\Models\Property;
use App\PropertyTextParser;
use Illuminate\Database\Seeder;

class Property12TxtSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('seeders/data/12.txt');

        if (!is_file($path)) {
            $this->command?->warn("Missing property text file: {$path}");
            return;
        }

        $raw = file_get_contents($path);
        if ($raw === false) {
            $this->command?->warn("Failed to read property text file: {$path}");
            return;
        }

        $data = PropertyTextParser::parse($raw);

        Property::create(array_merge($data, ['source_key' => '12']));
    }
}

