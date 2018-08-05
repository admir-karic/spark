<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_languages', function (Blueprint $table) {
            $table->primary(['game_id','language_id']);
			$table->unsignedInteger('game_id');
			$table->unsignedInteger('language_id');
            $table->timestamps();

			$table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
			$table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_languages');
    }
}
