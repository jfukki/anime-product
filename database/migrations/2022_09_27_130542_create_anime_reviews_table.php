<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimeReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anime_reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('anime_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('user_name')->nullable();
            $table->string('review_title')->nullable();
            $table->longText('review_text')->nullable();
            $table->integer('story')->nullable();
            $table->integer('animation')->nullable();
            $table->integer('characters')->nullable();
            $table->integer('music')->nullable();

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
        Schema::dropIfExists('anime_reviews');
    }
}
