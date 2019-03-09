<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->dateTime('incident_date')->nullable();
            $table->string('location')->nullable();
            $table->text('description')->nullable();

            $table->integer('victim_id')->unsigned();

            $table->foreign('victim_id')->references('id')->on('victims');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
}
