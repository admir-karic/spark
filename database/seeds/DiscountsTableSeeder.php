<?php

use App\Discount;
use Illuminate\Database\Seeder;

class DiscountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discount::create([
            'code' => bcrypt('abc123'),
            'value' => '5'
        ]);

		Discount::create([
            'code' => bcrypt('abc567'),
            'value' => '15'
        ]);

		Discount::create([
            'code' => bcrypt('def123'),
            'value' => '50'
        ]);

		Discount::create([
            'code' => bcrypt('def567'),
            'value' => '75'
        ]);
    }
}
