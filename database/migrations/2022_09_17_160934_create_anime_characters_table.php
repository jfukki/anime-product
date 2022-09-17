<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimeCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anime_characters', function (Blueprint $table) {
            $table->id();
            $table->integer('anime_id')->nullable();
            $table->string('character_name')->nullable();
            $table->string('character_image')->nullable();
            $table->string('character_role')->nullable();

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
        Schema::dropIfExists('anime_characters');
    }
}
