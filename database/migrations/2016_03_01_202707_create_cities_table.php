<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('cities', function (Blueprint $table) {
             $table->increments('id');
             $table->double('latitude', 18, 15);
             $table->double('longitude', 18, 15);
             $table->string('name');
             $table->string('state');
             $table->string('country');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::drop('cities');
     }
}
