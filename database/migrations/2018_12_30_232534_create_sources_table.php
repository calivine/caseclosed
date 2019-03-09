<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sources', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('url1')->nullable();
            $table->string('url2')->nullable();
            $table->string('url3')->nullable();
            $table->string('url4')->nullable();
            $table->string('url5')->nullable();

            // $table->integer('victim_id')->unsigned()->nullable();
            $table->integer('perpetrator_id')->unsigned();

            // $table->foreign('victim_id')->references('id')->on('victims');
            $table->foreign('perpetrator_id')->references('id')->on('perpetrators');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sources');
    }
}
