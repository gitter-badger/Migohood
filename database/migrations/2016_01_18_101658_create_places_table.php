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

            //Create
            $table->string('hash');
            $table->string('type');
            $table->string('other');
            $table->string('accomodance');
            $table->string('capacity');
            $table->string('bedrooms');
            $table->string('beds');
            $table->string('bathrooms');

            $table->string('def_title');
            $table->string('thumbnail')->default('/img/app/thumbnail.png');

            $table->string('public')->nullable();
            $table->string('where')->nullable();

            $table->string('title');
            $table->string('description')->nullable();

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
        Schema::drop('places');
    }
}
