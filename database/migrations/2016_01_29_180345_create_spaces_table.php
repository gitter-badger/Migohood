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
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
              ->references('id')->on('users')
              ->onDelete('cascade');
            $table->timestamps();

            $table->string('link');
            $table->string('public');

            $table->string('hash');
            $table->string('thumbnail')->default('/img/app/thumbnail.png');

            $table->string('type');
            $table->string('other')->nullable();
            $table->string('accomodance');

            $table->string('capacity');
            $table->string('bedrooms');
            $table->string('beds');
            $table->string('bathrooms');

            $table->string('price');
            $table->string('per');
            $table->string('coin');

            $table->string('title');
            $table->string('description');

            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->string('zip');

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
