<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonitoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitorings', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->boolean('status')->nullable();
            $table->integer('reating')->nullable();
            $table->integer('lesson_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->integer('group_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('monitorings');
    }
}
