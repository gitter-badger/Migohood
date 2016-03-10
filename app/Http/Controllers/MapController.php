<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MapController extends Controller
{
    /****************************
            Map Functions
    ****************************/
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
