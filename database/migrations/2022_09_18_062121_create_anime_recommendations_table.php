<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimeRecommendationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anime_recommendations', function (Blueprint $table) {
            $table->id();
            $table->integer('anime_id')->nullable();
            $table->integer('anime_mal_id')->nullable();
            $table->string('anime_picture')->nullable();
            $table->string('anime_title')->nullable();

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
        Schema::dropIfExists('anime_recommendations');
    }
}
