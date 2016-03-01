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

          // Basics
          $table->string('type');
          $table->string('room');
          $table->integer('capacity')->default(1);
          $table->integer('bedrooms')->default(1);
          $table->integer('beds')->default(1);
          $table->integer('bathrooms')->default(1);

          // Description
          $table->string('title')->nullable();
          $table->longText('description')->nullable();
          $table->string('pets_allowed')->nullable();
          $table->string('events_allowed')->nullable();
          $table->string('production_allowed')->nullable();
          $table->string('family_friendly')->nullable();
          $table->string('business_guest')->nullable();
          $table->string('smoke_free')->nullable();
          $table->string('gym')->nullable();
          $table->string('parking')->nullable();

          // Location
          $table->string('country')->nullable();
          $table->string('city')->nullable();
          $table->string('address')->nullable();
          $table->string('location_references')->nullable();
          $table->float('latitude');
          $table->float('longitude');

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
