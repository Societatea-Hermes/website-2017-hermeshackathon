<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auths', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('user_agent');
            $table->text('raw_request_params');
            $table->integer('successful')->nullable();
            $table->string('api_token')->nullable();
            $table->timestamp('expiration')->nullable();
            $table->timestamps();


        });

        Schema::table('auths', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('auths');
    }
}
