<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->integer('type'); // 1 - training, 2 - workshop, 3 - party
            $table->string('date');
            $table->string('time');
            $table->string('banner')->nullable();
            $table->string('location_text');
            $table->string('location_coordinate_x')->nullable();
            $table->string('location_coordinate_y')->nullable();
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
        Schema::drop('events');
    }
}
