<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$categories=array(
			'Massively Multiplayer Online (MMO)',
			'Simulation',
			'Adventure',
			'Real-Time Strategy (RTS)',
			'Puzzle',
			'Action',
			'First Person Shooter (FPS)',
			'Sport',
			'Role-Playing (RPG)'
		);

		foreach ($categories as $category){
            Category::create([
                'name' => $category
            ]);
        }
    }
}
