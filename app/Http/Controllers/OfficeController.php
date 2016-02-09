<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Office;
use App\Photo;

use Input;
use Auth;
use File;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OfficeController extends Controller
{

  /****************************
          Show Office
  ****************************/
  public function show($hash)
  {
    //Search Office
    $office = Office::where('hash', $hash)->first();

    //Is it null?
    if(is_null($office)) {
      return view('errors.404');  //404 Not found
    }

    $photos = DB::table('photos')->where('owner_hash', $office->hash)->get();

    return view('offices.show', ['office' => $office, 'photos' => $photos ]);
  }


  /****************************
        Create - POST
  ****************************/
  public function create(Request $request)
  {
    //Identifier
    $hash = str_random(40);
    $search = Office::where('hash', $hash)->first();

    //If Hash exists, Rehash
    if(!is_null($search)) {
      $hash = str_random(40);
    }

    //Create Office
    $request->user()->offices()->create([
      'hash' => $hash,
      'type' => $request->type,
      'accomodance' => $request->accomodance,
      'capacity' => $request->capacity,
      'public' => 'no',
    ]);

    //Redirect to Basic
    return redirect()->route('office.router', ['hash' => $hash, 'route' => 'basics' ]);
  }


  /****************************
          Routes - GET
  ****************************/
  public function router($hash, $route) {
    /*
    *   Validation for routes
    */

      //Search Office
      $office = Office::where('hash', $hash)->first();

      //Is it null?
      if(is_null($office)) {
        return view('errors.404');  //404 Not found
      }

      //Is it not the owner?
      if(Auth::user()->id != $office->user_id) {
        return view('errors.400'); //400 Bad Request
      }

    /*
    *   Redirect to -
    */

      // Basics
      if($route == 'basics') {
        return view('offices/create.basics', ['office' => $office]);
      }

      // Location
      if($route == 'location'){
        $countries =  DB::table('countries')->get();

        return view('offices/create.location', ['office' => $office, 'countries' => $countries]);
      }

      // Photos
      if($route == 'photos'){
        //Search Gallery
        $photos = DB::table('photos')->where('owner_hash', $office->hash)->get();

        //Return with Office & Photos
        return view('offices/create.photos', ['office' => $office, 'photos' => $photos]);
      }

      // Pricing
      if($route == 'pricing'){
        return view('offices/create.pricing', ['office' => $office]);
      }

      // Extras
      if($route == 'extras'){
        return view('offices/create.extras', ['office' => $office]);
      }

  }

  /****************************
          Routes - POST
  ****************************/
  public function update(Request $request, $hash, $route) {

    /*
    *   Validation for routes
    */

      //Search Office
      $office = Office::where('hash', $hash)->first();

      //Is it null?
      if(is_null($office)) {
        return view('errors.404');  //404 Not found
      }

      //Is it not the owner?
      if(Auth::user()->id != $office->user_id) {
        return view('errors.400'); //400 Bad Request
      }

    /*
    *   Update for -
    */

      /****************************
          Basics Update - POST
      ****************************/
      if($route == 'basics') {

        //Save Basics Updates
        $office->type = $request->type;
        $office->accomodance = $request->accomodance;
        $office->capacity = $request->capacity;
        $office->title = $request->title;
        $office->description = $request->description;

        //
        if($office->public == 'no') {
          $office->notpublic = 'office/'.$hash.'/location';
        }

        $office->save();

        return redirect()->route('office.router', ['hash' => $hash, 'route' => 'location' ]);
      }

      /****************************
          Location Update - POST
      ****************************/
      if($route == 'location') {

        //Save Location Updates
        $office->country = $request->country;
        $office->city = $request->city;
        $office->address = $request->address;
        $office->location_references = $request->location_references;
        $office->zip = $request->zip;

        //
        if($office->public == 'no') {
          $office->notpublic = 'office/'.$hash.'/photos';
        }

        $office->save();

        return redirect()->route('office.router', ['hash' => $hash, 'route' => 'photos' ]);

      }

      /****************************
          Thumbnail Update - POST
      ****************************/
      if($route == 'thumbnail'){
        //  $file = Input::hasFile('file');
          $file = $request->file('file');

        // If there is a file in the request, proceed
        if(!empty($file)) {

          // If thumbnail is default, do not delete, otherwise, overwrite
          if($office->thumbnail != '/img/app/thumbnail.png') {
            File::delete($office->thumbnail);
          }

          // Filename
          $filename = $hash.'.'.$request->file('file')->getClientOriginalExtension();

          // Store in 'thumbnails' folder
          $request->file('file')->move('thumbnails/offices', $filename);

          // Link recently updated with offices, which is the owner
          $office->thumbnail = '/thumbnails/offices/'.$filename;

          //
          if($office->public == 'no') {
            $office->notpublic = 'office/'.$hash.'/photos';
          }

            // Save new path
            $office->save();
          }

          return redirect()->route('office.router', ['hash' => $hash, 'route' => 'photos' ]);
      }


      /****************************
          Gallery Update - POST
      ****************************/
      if($route == 'gallery'){
        //Get all files in the request
        $files = $request->file('file');

         //If it is not null, proceed
        if ($request->hasFile('file')) {

          //Count
          $i = '0';

          foreach($files as $file) {
            //New file name
            $filename = $i++.'_'.$hash.'.'.$file->getClientOriginalExtension();

            //New Path
            $new_path = '/photos/offices/'.$filename;

            //Search if exists
            $search = Photo::where('path', $new_path)->first();

              if(!is_null($search)){
                $search->delete();      //Delete if exists
              }

            // Move file to 'photos' folder
            $file->move('photos/offices', $filename);

             //Save Photos Paths in DB
             $photo = new Photo;
             $photo->owner_hash = $hash;
             $photo->path = '/photos/offices/'.$filename;
             $photo->save();
          }

        }

        return redirect()->route('office.router', ['hash' => $hash, 'route' => 'photos' ]);
      }


      /****************************
          Pricing Update - POST
      ****************************/
      if($route == 'pricing'){

        //Save Pricing Updates
        $office->price = $request->price;
        $office->per = $request->per;
        $office->currency = $request->currency;
        $office->save();

        //Public
        $office->public = 'yes';
        $office->notpublic = 'null';
        $office->save();

        //Return
        return redirect()->route('office.router', ['hash' => $hash, 'route' => 'extras' ]);
      }

      /****************************
          Extras Update - POST
      ****************************/
      if($route == 'extras'){

        /* Amenities */
        if($request->bathroom == 'yes') {
          $office->bathroom = $request->bathroom;
        }

        if($request->tv_cable == 'yes') {
          $office->tv_cable = $request->tv_cable;
        }

        if($request->air_conditioning == 'yes') {
          $office->air_conditioning = $request->air_conditioning;
        }

        if($request->heating == 'yes') {
          $office->heating = $request->heating;
        }

        if($request->wifi == 'yes') {
          $office->wifi = $request->wifi;
        }

        /* Other */
        if($request->parking == 'yes') {
          $office->parking = $request->parking;
        }

        if($request->elevator == 'yes') {
          $office->elevator = $request->elevator;
        }

        if($request->room_meeting == 'yes') {
          $office->room_meeting = $request->room_meeting;
        }

        /* Special */
        if($request->smoking_allowed == 'yes') {
          $office->smoking_allowed = $request->smoking_allowed;
        }

        //
        $office->save();

        return redirect('/myoffices');
      }

  }


}
