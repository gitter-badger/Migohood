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
            $table->string('towels')->default('no');
            $table->string('bed_sheets')->default('no');
            $table->string('soap')->default('no');
            $table->string('toilet_paper')->default('no');
            $table->string('shampoo')->default('no');
            $table->string('tv')->default('no');
            $table->string('air_conditioning')->default('no');
            $table->string('heating')->default('no');
            $table->string('kitchen')->default('no');
            $table->string('wifi')->default('no');
            $table->string('iron')->default('no');
            $table->string('breakfast')->default('no');

            /* Other */
            $table->string('hot_tub')->default('no');
            $table->string('washer')->default('no');
            $table->string('pool')->default('no');
            $table->string('dryer')->default('no');
            $table->string('parking')->default('no');
            $table->string('gym')->default('no');
            $table->string('elevator')->default('no');
            $table->string('workspace')->default('no');

            /* Special */
            $table->string('family_kid_friendly')->default('no');
            $table->string('smoking_allowed')->default('no');
            $table->string('pets_allowed')->default('no');
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
