<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Property;
use Database\Seeders\Properties\Property10TxtSeeder;
use Database\Seeders\Properties\Property11TxtSeeder;
use Database\Seeders\Properties\Property12TxtSeeder;
use Database\Seeders\Properties\Property1TxtSeeder;
use Database\Seeders\Properties\Property2TxtSeeder;
use Database\Seeders\Properties\Property3TxtSeeder;
use Database\Seeders\Properties\Property4TxtSeeder;
use Database\Seeders\Properties\Property5TxtSeeder;
use Database\Seeders\Properties\Property6TxtSeeder;
use Database\Seeders\Properties\Property7TxtSeeder;
use Database\Seeders\Properties\Property8TxtSeeder;
use Database\Seeders\Properties\Property9TxtSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Avoid duplicate seeding when re-running `php artisan db:seed`.
        if (!User::query()->where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        // Insert property records from text seed files.
        Property::query()->delete();

        $this->call([
            Property1TxtSeeder::class,
            Property2TxtSeeder::class,
            Property3TxtSeeder::class,
            Property4TxtSeeder::class,
            Property5TxtSeeder::class,
            Property6TxtSeeder::class,
            Property7TxtSeeder::class,
            Property8TxtSeeder::class,
            Property9TxtSeeder::class,
            Property10TxtSeeder::class,
            Property11TxtSeeder::class,
            Property12TxtSeeder::class,
        ]);

        $this->call([
            PropertyImagesSeeder::class,
        ]);
    }
}
