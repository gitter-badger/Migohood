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
          // Default
          $table->increments('id');
          $table->integer('user_id');
          $table->string('hash');
          $table->string('status')->default('not_listed');

          $table->integer('stars')->default(0);
          $table->integer('likes')->default(0);
          $table->integer('reviews')->default(0);

          $table->timestamps();

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
          $table->integer('city_id')->nullable();
          $table->string('address')->nullable();
          $table->longText('location_references')->nullable();
          $table->double('latitude', 18, 15)->nullable();
          $table->double('longitude', 18, 15)->nullable();

          // Photos
          $table->string('thumbnail')->default('/img/app/thumbnail.png');

          // Price
          $table->decimal('price', 5, 2)->nullable();
          $table->string('per')->nullable();
          $table->string('currency')->default('USD');

          // Calendar
          $table->string('check_in')->nullable();
          $table->string('check_out')->nullable();

          // Extras
          $table->string('towels')->nullable();
          $table->string('bed_sheets')->nullable();
          $table->string('soap')->nullable();
          $table->string('shampoo')->nullable();
          $table->string('toilet_paper')->nullable();
          $table->string('cleaning_kit')->nullable();
          $table->string('iron')->nullable();
          $table->string('hair_dryer')->nullable();
          $table->string('elevator')->nullable();
          $table->string('hot_tub')->nullable();
          $table->string('washer')->nullable();
          $table->string('dishwasher')->nullable();

          $table->string('wheelchair_access')->nullable();
          $table->string('AC')->nullable();
          $table->string('heat')->nullable();
          $table->string('ByB')->nullable();
          $table->string('workspace')->nullable();
          $table->string('pool')->nullable();
          $table->string('sauna')->nullable();
          $table->string('terrace')->nullable();
          $table->string('chef')->nullable();
          $table->string('translator')->nullable();
          $table->string('flexible_check_in')->nullable();
          $table->string('flexible_check_out')->nullable();

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
