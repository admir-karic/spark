<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_categories', function (Blueprint $table) {
            $table->primary(['game_id','category_id']);
			$table->unsignedInteger('game_id');
			$table->unsignedInteger('category_id');
            $table->timestamps();

			$table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_categories');
    }
}
