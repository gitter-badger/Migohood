<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = json_decode(File::get(storage_path() . "/data/cities.json"));
        foreach ($cities as $city) {
          DB::table('cities')->insert([
            'latitude' => $city->latitude,
            'longitude' => $city->longitude,
            'name' => $city->name,
            'state' => $city->state,
            'country' => $city->country
          ]);
        }
    }
}
