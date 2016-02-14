<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname')->default('null');
            $table->string('homephone')->default('null');
            $table->string('cellphone')->default('null');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('avatar')->default('/img/app/default.jpg');

            $table->integer('stars')->default(0);
            $table->integer('recommends')->default(0);
            $table->integer('votes')->default(0);
            $table->integer('comments')->default(0);

            $table->string('country')->default('null');
            $table->string('city')->default('null');
            $table->string('address')->default('null');
            $table->string('location_references')->default('null');
            $table->string('zip')->default('null');

            $table->rememberToken();
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
        Schema::drop('users');
    }
}
