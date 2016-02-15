<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {

              $table->increments('id');
              $table->timestamps();

              //
              $table->string('hash');
              $table->integer('who_requests');
              $table->integer('who_rents');
              $table->string('announce_hash');
              $table->string('announce_type');

              $table->timestamp('when_stars');
              $table->timestamp('when_ends');
              $table->string('capacity');

              $table->string('ammount');
              $table->string('status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reservations');
    }
}
