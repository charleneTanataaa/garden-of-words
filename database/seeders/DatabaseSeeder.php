<?php

namespace Database\Seeders;

use App\Models\Flower;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Flower::insert([
            ['name' => 'Sunflower'],
            ['name' => 'Rose'],
            ['name' => 'Tulip'],
            ['name' => 'Lily'],
            ['name' => 'Daisy'],
            ['name' => 'Lavender'],
            ['name' => 'Orchid'],
            ['name' => 'Peony'],
            ['name' => 'Marigold'],
        ]);

        User::factory()->create([
            'username' => 'testuser',
            'email' => 'test@example.com',
            'selected_flower_id' => 1, 
            'password' => bcrypt('password'),
            'flower_start_date' => now(),
        ]);

    }
}
