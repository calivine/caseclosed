<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVictimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('victims', function (Blueprint $table) {
            # Increments method will make Primary, Auto-Incrementing field
            $table->increments('id');

            # Generates two columns: 'created_at' and 'updated_at' to
            # keep track of changes to a row
            $table->timestamps();

            # Rest of the table fields.
            $table->string('first_name');
            $table->string('middle_name')->default('');
            $table->string('last_name');
            $table->date('date_of_birth')->nullable();
            $table->integer('age')->nullable();
            $table->char('gender')->nullable();
            $table->string('cause_of_death');
            $table->date('incident_date')->nullable();
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->integer('perpetrator_id')->unsigned();
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
        Schema::dropIfExists('victims');
    }
}
