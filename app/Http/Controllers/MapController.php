<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Space;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MapController extends Controller
{
    /****************************
            Map Functions
    ****************************/

    public function help(){

      $search = Space::where('status', 'listed')
                ->orderBy('created_at', 'desc')
                ->get();

      //return $search->current_page;
      $json = '';     // Json
      $i = 0;         // Counter

      foreach ($search as $resource) {
        $i++;                                         // Currently
        $json = $json .
          '{'.'"lat":'.' "'.$resource->latitude.'",'.   // { "lat": "00.00",
              '"lng":'.' "'.$resource->longitude.'"'.   //   "lng": "00.00"
          '}';                                          // }
            if($search->count() != $i) {
              $json = $json.',';       // Comma if it's not the last one
            }
      }

      //$json = '['. $json .']';    // [{ Object }, { Object }]


      return response()->json([$json]);

      //return $json;

    }


     // Get City Json
     public function getIndividualCity($id) {
       // Search id in the table of Cities
       $city = DB::table('cities')
                   ->where('id', $id)->first();

      // Return Json with info
       return response()->json([
         'lat' => $city->latitude,
         'lng' => $city->longitude,
         'name' => $city->name,
         'state' => $city->state,
         'country' => $city->country
       ]);

     }
}
