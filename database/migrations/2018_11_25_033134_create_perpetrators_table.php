<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerpetratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perpetrators', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('first_name');
            $table->string('middle_name')->default('');
            $table->string('last_name');
            $table->date('date_of_birth')->nullable();
            $table->text('description')->nullable();
            $table->boolean('criminal_record')->default(false);
            $table->date('arrest_date')->nullable();
            $table->date('date_of_death')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perpetrators');
    }
}
