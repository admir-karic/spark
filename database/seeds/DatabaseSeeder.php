<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
		$this->call(DiscountsTableSeeder::class);
		$this->call(OrdersTableSeeder::class);
		$this->call(SpecificationsTableSeeder::class);
		$this->call(PlayerNumbersTableSeeder::class);
		$this->call(GamesTableSeeder::class);
		$this->call(CategoriesTableSeeder::class);
		$this->call(LanguagesTableSeeder::class);
    }
}
