<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'ip' => '127.0.0.1',
          'role' => 'admin',
          'name' => env('ADM_NAME'),
          'email' => env('ADM_EMAIL'),
          'password' => bcrypt(env('ADM_PASS')),
        ]);

    }
}
