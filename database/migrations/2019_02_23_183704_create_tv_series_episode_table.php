<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTvSeriesEpisodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tv_series_episode', function (Blueprint $table) {
            $table->increments('episode_id');
            $table->integer('category');
            $table->integer('series_id');
            $table->integer('season')->nullable();
            $table->integer('episode');
            $table->string('size');
            $table->string('link');
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
        Schema::dropIfExists('tv_series_episode');
    }
}
