<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->integer('anime_id')->nullable();
            $table->string('english_title')->nullable();
            $table->longText('synopsis')->nullable();
            $table->integer('rank')->nullable();
            $table->integer('popularity')->nullable();
            $table->string('youtube_trailer')->nullable();
            $table->string('type')->nullable();
            $table->integer('no_of_episodes')->nullable();
            $table->string('status')->nullable();
            $table->longText('aired')->nullable();
            $table->string('season')->nullable();
            $table->longText('broadcast')->nullable();
            $table->string('rating')->nullable();
            $table->string('duration')->nullable();
            $table->string('source')->nullable();
            $table->longText('anime_image')->nullable();

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
        Schema::dropIfExists('animes');
    }
}
