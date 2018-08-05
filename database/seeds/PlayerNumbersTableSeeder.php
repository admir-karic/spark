<?php

use App\PlayerNumber;
use Illuminate\Database\Seeder;

class PlayerNumbersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlayerNumber::create([
            'name' => 'Single-Player'
        ]);

		PlayerNumber::create([
            'name' => 'Multi-Player'
        ]);

		PlayerNumber::create([
            'name' => 'Online Multi-Player'
        ]);

		PlayerNumber::create([
            'name' => 'Co-op'
        ]);
    }
}
