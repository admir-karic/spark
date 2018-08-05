<?php

use App\Game;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::create([
            'name' => 'Grand Theft Auto V',
			'developer' => 'Rockstar North',
			'release_date' => Carbon::create(2015, 4, 14),
			'price' => '30',
			'image' => 'image1.jpg',
			'specification_id' => '1',
			'player_number_id' => '1'
        ]);

		 Game::create([
            'name' => 'Counter-Strike: Global Offensive',
			'developer' => 'Valve',
			'release_date' => Carbon::create(2012, 8, 21),
			'price' => '15',
			'image' => 'image2.jpg',
			'specification_id' => '2',
			'player_number_id' => '3'
        ]);
    }
}
