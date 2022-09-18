<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopularAnimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popular_animes', function (Blueprint $table) {
            $table->id();
            $table->integer('anime_id')->nullable();
            $table->string('anime_title')->nullable();
            $table->string('anime_picture')->nullable();
            $table->string('popularity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('popular_animes');
    }
}
