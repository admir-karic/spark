<?php

use App\Language;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages=array(
			'English',
			'German',
			'French',
			'Spanish',
			'Swedish',
			'Greek',
			'Italian',
			'Japanese'
		);

		foreach ($languages as $language){
            Language::create([
                'name' => $language
            ]);
        }
    }
}
