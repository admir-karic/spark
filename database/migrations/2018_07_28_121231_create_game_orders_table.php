<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_orders', function (Blueprint $table) {
            $table->primary(['game_id','order_id']);
			$table->unsignedInteger('order_id');
			$table->unsignedInteger('game_id');
            $table->timestamps();

			$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
			$table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_orders');
    }
}
