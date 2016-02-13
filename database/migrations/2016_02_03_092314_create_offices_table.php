<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('offices', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
          $table->timestamps();

          $table->string('hash');
          $table->string('thumbnail')->default('/img/app/thumbnail.png');
          $table->string('notpublic')->default('null');
          $table->string('public')->default('no');

          $table->integer('stars')->default(0);
          $table->integer('recommends')->default(0);
          $table->integer('votes')->default(0);
          $table->integer('comments')->default(0);

          //Basics
          $table->string('type')->default('null');
          $table->string('accomodance')->default('null');
          $table->string('capacity')->default('null');
          $table->string('title')->default('null');
          $table->string('description')->default('null');

          //Location
          $table->string('country')->default('null');
          $table->string('city')->default('null');
          $table->string('address')->default('null');
          $table->string('location_references')->default('null');
          $table->string('zip')->default('null');

          //Pricing
          $table->string('price')->default('null');
          $table->string('per')->default('null');
          $table->string('currency')->default('null');

          //Extras
          /* Amenities */
          $table->string('bathroom')->default('no');
          $table->string('tv_cable')->default('no');
          $table->string('air_conditioning')->default('no');
          $table->string('heating')->default('no');
          $table->string('wifi')->default('no');

          /* Other */
          $table->string('parking')->default('no');
          $table->string('elevator')->default('no');
          $table->string('room_meeting')->default('no');

          /* Special */
          $table->string('smoking_allowed')->default('no');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('offices');
    }
}
