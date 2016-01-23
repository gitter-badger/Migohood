<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
              ->references('id')->on('users')
              ->onDelete('cascade');
            $table->timestamps();

            //Create
            $table->string('name');
            $table->string('default_title');
            $table->string('type');
            $table->string('accomodance');
            $table->string('thumbnail')->default('/img/thumbnail-default.jpg');

            $table->string('other')->nullable();

            $table->string('title');
            $table->string('public')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('places');
    }
}
