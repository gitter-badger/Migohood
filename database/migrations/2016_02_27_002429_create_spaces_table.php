<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spaces', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id');
          $table->timestamps();
          $table->string('status')->default('not_listed');

          $table->string('hash');
          $table->string('thumbnail')->default('/img/app/thumbnail.png');

          //Basics
          $table->string('type');
          $table->string('room');
          $table->string('capacity');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('spaces');
    }
}
