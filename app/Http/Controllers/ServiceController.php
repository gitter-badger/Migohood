<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Service;
use App\Photo;

use Input;
use Auth;
use File;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
  /****************************
          Show Service
  ****************************/
  public function show($hash)
  {
    //Search Service
    $service = Service::where('hash', $hash)->first();

    //Is it null?
    if(is_null($service)) {
      return view('errors.404');  //404 Not found
    }

    //Is it not the owner?
    if(Auth::user()->id != $service->user_id) {
      return view('errors.400'); //400 Bad Request
    }

    $photos = DB::table('photos')->where('owner_hash', $service->hash)->get();

    return view('services.show', ['service' => $service, 'photos' => $photos ]);
  }

  /****************************
        Create - POST
  ****************************/
  public function create(Request $request)
  {
    //Identifier
    $hash = str_random(40);
    $search = Service::where('hash', $hash)->first();

    //If Hash exists, Rehash
    if(!is_null($search)) {
      $hash = str_random(40);
    }

    //Create Service
    $request->user()->services()->create([
      'hash' => $hash,
      'type' => $request->type,
      'capacity' => $request->capacity,
      'title' => $request->title,
      'description' => $request->description,
      'public' => 'no',
    ]);

    //Redirect to Basic
    return redirect()->route('service.router', ['hash' => $hash, 'route' => 'location' ]);
  }


  /****************************
          Routes - GET
  ****************************/
  public function router($hash, $route) {
    /*
    *   Validation for routes
    */

      //Search Service
      $service = Service::where('hash', $hash)->first();

      //Is it null?
      if(is_null($service)) {
        return view('errors.404');  //404 Not found
      }

      //Is it not the owner?
      if(Auth::user()->id != $service->user_id) {
        return view('errors.400'); //400 Bad Request
      }

    /*
    *   Redirect to -
    */

      // Basics
      if($route == 'basics') {
        return view('services/create.basics', ['service' => $service]);
      }

      // Location
      if($route == 'location'){
        $countries =  DB::table('countries')->get();

        return view('services/create.location', ['service' => $service, 'countries' => $countries]);
      }

      // Photos
      if($route == 'photos'){
        //Search Gallery
        $photos = DB::table('photos')->where('owner_hash', $service->hash)->get();

        //Return with Service & Photos
        return view('services/create.photos', ['service' => $service, 'photos' => $photos]);
      }

      // Pricing
      if($route == 'pricing'){
        return view('services/create.pricing', ['service' => $service]);
      }

  }


  /****************************
          Routes - POST
  ****************************/
  public function update(Request $request, $hash, $route) {

    /*
    *   Validation for routes
    */

      //Search Service
      $service = Service::where('hash', $hash)->first();

      //Is it null?
      if(is_null($service)) {
        return view('errors.404');  //404 Not found
      }

      //Is it not the owner?
      if(Auth::user()->id != $service->user_id) {
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
        $service->type = $request->type;
        $service->capacity = $request->capacity;
        $service->title = $request->title;
        $service->description = $request->description;

        //
        if($service->public == 'no') {
          $service->notpublic = 'service/'.$hash.'/location';
        }

        $service->save();

        return redirect()->route('service.router', ['hash' => $hash, 'route' => 'location' ]);
      }

      /****************************
          Location Update - POST
      ****************************/
      if($route == 'location') {

        //Save Location Updates
        $service->country = $request->country;
        $service->city = $request->city;
        $service->address = $request->address;
        $service->location_references = $request->location_references;
        $service->zip = $request->zip;

        //
        if($service->public == 'no') {
          $service->notpublic = 'service/'.$hash.'/photos';
        }

        $service->save();

        return redirect()->route('service.router', ['hash' => $hash, 'route' => 'photos' ]);

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
          if($service->thumbnail != '/img/app/thumbnail.png') {
            File::delete($service->thumbnail);
          }

          // Filename
          $filename = $hash.'.'.$request->file('file')->getClientOriginalExtension();

          // Store in 'thumbnails' folder
          $request->file('file')->move('thumbnails/services', $filename);

          // Link recently updated with services, which is the owner
          $service->thumbnail = '/thumbnails/services/'.$filename;

          //
          if($service->public == 'no') {
            $service->notpublic = 'service/'.$hash.'/photos';
          }

            // Save new path
            $service->save();
          }

          return redirect()->route('service.router', ['hash' => $hash, 'route' => 'photos' ]);
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
            $new_path = '/photos/services/'.$filename;

            //Search if exists
            $search = Photo::where('path', $new_path)->first();

              if(!is_null($search)){
                $search->delete();      //Delete if exists
              }

            // Move file to 'photos' folder
            $file->move('photos/services', $filename);

             //Save Photos Paths in DB
             $photo = new Photo;
             $photo->owner_hash = $hash;
             $photo->path = '/photos/services/'.$filename;
             $photo->save();
          }

        }

        return redirect()->route('service.router', ['hash' => $hash, 'route' => 'photos' ]);
      }


      /****************************
          Pricing Update - POST
      ****************************/
      if($route == 'pricing'){

        //Save Pricing Updates
        $service->price = $request->price;
        $service->per = $request->per;
        $service->currency = $request->currency;
        $service->save();

        //Public
        $service->public = 'yes';
        $service->notpublic = 'null';
        $service->save();

        return redirect('/myservices');
      }

  }


}
