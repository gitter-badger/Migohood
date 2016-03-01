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
          $table->string('hash');
          $table->string('status')->default('not_listed');

          //Basics
          $table->string('type');
          $table->string('room');
          $table->integer('capacity')->default(1);

          $table->integer('stars')->default(0);
          $table->integer('likes')->default(0);
          $table->integer('reviews')->default(0);
          $table->string('thumbnail')->default('/img/app/thumbnail.png');

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
        Schema::drop('spaces');
    }
}
