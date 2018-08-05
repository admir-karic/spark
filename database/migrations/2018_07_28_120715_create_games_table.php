<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
           $table->increments('id');
			$table->string('name');
			$table->string('developer');
			$table->date('release_date');
			$table->float('price');
			$table->string('image')->unique();
			$table->unsignedInteger('specification_id');
			$table->unsignedInteger('player_number_id');
            $table->timestamps();

			$table->foreign('specification_id')->references('id')->on('specifications')->onDelete('cascade');
			$table->foreign('player_number_id')->references('id')->on('player_numbers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
