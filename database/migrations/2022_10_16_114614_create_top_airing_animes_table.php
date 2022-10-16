<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopAiringAnimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_airing_animes', function (Blueprint $table) {
            $table->id();
            
            $table->integer('anime_id')->nullable();
            $table->string('english_title')->nullable();
            $table->string('japanese_title')->nullable();
            $table->string('anime_image')->nullable();

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
        Schema::dropIfExists('top_airing_animes');
    }
}
