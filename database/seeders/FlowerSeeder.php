<?php

namespace Database\Seeders;

use App\Models\Flower;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $flowers = [
            'Sunflower',
            'Rose',
            'Tulip',
            'Daisy',
            'Lavender',
            'Lily',
            'Sakura',
            'Peony',
            'Bluebell'
        ];

        foreach ($flowers as $flower)
        {
            Flower::create(['name' => $flower]);
        }
    }
}
