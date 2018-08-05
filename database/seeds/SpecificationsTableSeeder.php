<?php

use App\Specification;
use Illuminate\Database\Seeder;

class SpecificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Specification::create([
			'game' => 'gta V',
            'os' => 'Windows 10 64 Bit, Windows 8.1 64 Bit, Windows 8 64 Bit, Windows 7 64 Bit Service Pack 1',
            'processor' => 'Intel Core 2 Quad CPU Q6600 @ 2.40GHz (4 CPUs) / AMD Phenom 9850 Quad-Core Processor (4 CPUs) @ 2.5GHz',
            'memory' => '4 GB RAM',
            'graphics' => 'NVIDIA 9800 GT 1GB / AMD HD 4870 1GB (DX 10, 10.1, 11)',
			'hard_drive' => '72 GB available space'
        ]);

		Specification::create([
			'game' => 'csgo',
            'os' => 'Windows 10 64 Bit, Linux',
            'processor' => 'Intel Core i5 3470 @ 3.2GHz (4 CPUs) / AMD X8 FX-8350 @ 4GHz (8 CPUs)',
            'memory' => '8 GB RAM',
            'graphics' => 'NVIDIA GTX 660 2GB / AMD HD 7870 2GB',
			'hard_drive' => '30 GB available space'
        ]);


    }
}
