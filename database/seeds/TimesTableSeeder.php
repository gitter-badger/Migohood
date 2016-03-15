<?php

use Illuminate\Database\Seeder;

class TimesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
      $cities = json_decode(File::get(storage_path() . "/data/times.json"));
      foreach ($cities as $city) {
        DB::table('times')->insert(['time' => $city->time]);
      }
  }
}
