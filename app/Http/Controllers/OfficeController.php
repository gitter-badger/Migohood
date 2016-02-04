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
    return redirect('office/'.$hash.'/edit');
  }

  /*******************
      Edit - GET
  *******************/
  public function edit($hash)
  {
    //Search Office
    $office = Office::where('hash', $hash)->first();

    //Is it null?
    if(is_null($office)) {
      return view('errors.404'); //404 Not found
    } //If Null

    //Is it not the owner?
    if(Auth::user()->id != $office->user_id) {
      return view('errors.400'); //400 Bad Request
    }

    //Return Gallery
    $photos = DB::table('photos')->where('owner_hash', $office->hash)->get();

    //Return with Office & Photos
    return view('offices.edit', ['office' => $office, 'photos' => $photos]);

  }

  /*******************
    Update - Post
  *******************/
  public function update(Request $request, $hash)
  {
    //Search Office
    $office = Office::where('hash', $hash)->first();

    //Is it null?
    if(is_null($office)) {
      return view('errors.404'); //404 Not found
    } //If Null

    //Is it not the owner?
    if(Auth::user()->id != $office->user_id) {
      return view('errors.400'); //400 Bad Request
    }

    //Save Basics Updates
    $office->type = $request->type;
    $office->accomodance = $request->accomodance;
    $office->capacity = $request->capacity;
    $office->title = $request->title;
    $office->description = $request->description;

    $office->country = $request->country;
    $office->city = $request->city;
    $office->address = $request->address;
    $office->location_references = $request->location_references;
    $office->zip = $request->zip;

    $office->price = $request->price;
    $office->per = $request->per;
    $office->currency = $request->currency;

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

    if($request->parking == 'yes') {
      $office->parking = $request->parking;
    }

    if($request->elevator == 'yes') {
      $office->elevator = $request->elevator;
    }

    if($request->room_meeting == 'yes') {
      $office->room_meeting = $request->room_meeting;
    }

    if($request->smoking_allowed == 'yes') {
      $office->smoking_allowed = $request->smoking_allowed;
    }

    $office->public == 'no';

    $office->save();

    return redirect('office/'.$hash.'/edit');

  }

  /****************************
    Thumbnail Update - POST
  ****************************/
  public function updateThumbnail(Request $request, $hash) {
    //Search Office
    $office = Office::where('hash', $hash)->first();

    //Is it null?
    if(is_null($office)) {
      return view('errors.404'); //404 Not found
    } //If Null

    //Is it not the owner?
    if(Auth::user()->id != $office->user_id) {
      return view('errors.400'); //400 Bad Request
    }

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
      $request->file('file')->move('thumbnails_offices', $filename);

      // Link recently updated with Office, which is the owner
      $office->thumbnail = '/'.'thumbnails_offices/'.$filename;

      $office->public = 'yes';

      // Save new path
      $office->save();
    }

      return redirect('office/'.$hash.'/edit');
  }

  /****************************
      Gallery Update - POST
  ****************************/
  public function updateGallery(Request $request, $hash) {
    //Search Office by hash
    $office = Office::where('hash', $hash)->first();

    //Is it null?
    if(is_null($office)) {
      return view('errors.404'); //404 Not found
    } //If Null

    //Is it not the owner?
    if(Auth::user()->id != $office->user_id) {
      return view('errors.400'); //400 Bad Request
    }

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
        $new_path = '/photos_offices'.'/'.$filename;

        //Search if exists
        $search = Photo::where('path', $new_path)->first();

          if(!is_null($search)){
            $search->delete();      //Delete if exists
          }

        // Move file to 'photos_offices' folder
        $file->move('photos_offices', $filename);

         //Save Photos Paths in DB
         $photo = new Photo;
         $photo->owner_hash = $hash;
         $photo->path = '/photos_offices'.'/'.$filename;
         $photo->save();
      }

    }

    return redirect('office/'.$hash.'/edit');
}


  /****************************
          Show Office
  ****************************/
  public function show($hash)
  {
      $office = Office::where('hash', $hash)->first();

      //Is it null?
      if(is_null($office)) {
        return view('errors.404'); //404 Not found
      } //If Null

      //Is it not the owner?
      if(Auth::user()->id != $office->user_id) {
        return view('errors.400'); //400 Bad Request
      }

      $photos = DB::table('photos')->where('owner_hash', $office->hash)->get();

      return view('offices.show', ['office' => $office, 'photos' => $photos ]);

  }

}
