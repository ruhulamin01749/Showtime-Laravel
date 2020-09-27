<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('movie_id');
            $table->string('movie_name');
            $table->string('movie_image');
            $table->string('slider_image');
            $table->string('movie_link');
            $table->string('movie_subtitle');
            $table->integer('movie_category');
            $table->integer('movie_sub_category');
            $table->string('movie_year');
            $table->integer('movie_resulation');
            $table->integer('movie_sequel');
            $table->string('imdb_link');
            $table->string('realese_date');
            $table->string('director');
            $table->string('cast');
            $table->string('rating');
            $table->string('trailor');
            $table->integer('view');
            $table->string('movie_size');
            $table->integer('new');
            $table->integer('slider');
            $table->string('date_time');
            $table->string('user');
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
        Schema::dropIfExists('movies');
    }
}
