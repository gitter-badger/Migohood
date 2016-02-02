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

            $table->string('hash');
            $table->string('thumbnail')->default('/img/app/thumbnail.png');
            $table->string('notpublic');
            $table->string('public');

            //Basics
            $table->string('type');
            $table->string('accomodance');
            $table->string('capacity')->default('null');
            $table->string('bedrooms')->default('null');
            $table->string('beds')->default('null');
            $table->string('bathrooms')->default('null');

            //Description
            $table->string('title')->default('null');
            $table->string('description')->default('null');

            $table->string('price')->default('null');
            $table->string('per')->default('null');
            $table->string('coin')->default('null');

            $table->string('country')->default('null');
            $table->string('city')->default('null');
            $table->string('address')->default('null');
            $table->string('location_references')->default('null');
            $table->string('zip')->default('null');

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
