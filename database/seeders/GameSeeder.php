<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::create([
            'name' => 'Game 1',
            'image_url' => 'https://via.placeholder.com/300x200',
            'link' => 'https://example.com/game1',
        ]);

        Game::create([
            'name' => 'Game 2',
            'image_url' => 'https://via.placeholder.com/300x200',
            'link' => 'https://example.com/game2',
        ]);
    }
}
