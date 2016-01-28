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

            $table->timestamps();
            $table->string('hash');
            $table->string('thumbnail')->default('/img/app/thumbnail.png');

            /* 1 */
            $table->string('type');
            $table->string('other');
            $table->string('accomodance');
            $table->string('capacity');

            /* 2 */
            $table->string('bedrooms');
            $table->string('beds');
            $table->string('bathrooms');

            /* 3 */
            $table->string('price');
            $table->string('per');
            $table->string('coin');

            /* 4 */
            $table->string('title');
            $table->string('description');

            /* 5 */
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
        Schema::drop('places');
    }
}
