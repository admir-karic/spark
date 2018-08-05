<?php

use App\Order;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'order_date' => Carbon::now(),
			'total' => '30',
			'user_id' => '1'
        ]);

		Order::create([
            'order_date' => Carbon::now(),
			'total' => '300',
			'user_id' => '2',
			'discount_id' => '1'
        ]);
    }
}
