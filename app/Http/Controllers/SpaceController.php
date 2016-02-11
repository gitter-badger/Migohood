<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Space;
use App\Photo;

use Input;
use Auth;
use File;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SpaceController extends Controller
{
    /****************************
            Show Space
    ****************************/
    public function show($hash)
    {
      //Search Space
      $space = Space::where('hash', $hash)->first();

      //Is it null?
      if(is_null($space)) {
        return view('errors.404');  //404 Not found
      }

      //Photos
      $photos = DB::table('photos')->where('owner_hash', $space->hash)->get();

      return view('spaces.show', ['space' => $space, 'photos' => $photos ]);
    }


    /****************************
            Create - POST
    ****************************/
    public function create(Request $request) {
      //Create a Hash
      $hash = str_random(40);
      $search = Space::where('hash', $hash)->first();

      //If Hash exists, Rehash
      if(!is_null($search)) {
        $hash = str_random(40);
      }

      //Create Space
      $request->user()->spaces()->create([
        'hash' => $hash,
        'type' => $request->type,
        'accomodance' => $request->accomodance,
        'notpublic' => 'space/'.$hash.'/basics',
        'public' => 'no',
      ]);

      //Redirect to Basics
      return redirect()->route('space.router', ['hash' => $hash, 'route' => 'basics' ]);
    }


    /****************************
            Routes - GET
    ****************************/
    public function router($hash, $route) {
      /*
      *   Validation for routes
      */

        //Search Space
        $space = Space::where('hash', $hash)->first();

        //Is it null?
        if(is_null($space)) {
          return view('errors.404');  //404 Not found
        }

        //Is it not the owner?
        if(Auth::user()->id != $space->user_id) {
          return view('errors.400'); //400 Bad Request
        }

      /*
      *   Redirect to -
      */

        // Basics
        if($route == 'basics') {
          return view('spaces/create.basics', ['space' => $space]);
        }

        // Description
        if($route == 'description'){
          return view('spaces/create.description', ['space' => $space]);
        }

        // Location
        if($route == 'location'){
          $countries =  DB::table('countries')->get();

          return view('spaces/create.location', ['space' => $space, 'countries' => $countries]);
        }

        // Photos
        if($route == 'photos'){
          //Search Gallery
          $photos = DB::table('photos')->where('owner_hash', $space->hash)->get();

          //Return with space & Photos
          return view('spaces/create.photos', ['space' => $space, 'photos' => $photos]);
        }

        // Pricing
        if($route == 'pricing'){
          return view('spaces/create.pricing', ['space' => $space]);
        }

        // Extras
        if($route == 'extras'){
          return view('spaces/create.extras', ['space' => $space]);
        }

    }


    /****************************
            Routes - POST
    ****************************/
    public function update(Request $request, $hash, $route) {

      /*
      *   Validation for routes
      */

        //Search Space
        $space = Space::where('hash', $hash)->first();

        //Is it null?
        if(is_null($space)) {
          return view('errors.404');  //404 Not found
        }

        //Is it not the owner?
        if(Auth::user()->id != $space->user_id) {
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
          $space->type = $request->type;
          $space->accomodance = $request->accomodance;
          $space->capacity = $request->capacity;
          $space->bedrooms = $request->bedrooms;
          $space->beds = $request->beds;
          $space->bathrooms = $request->bathrooms;

          //
          if($space->public == 'no') {
            $space->notpublic = 'space/'.$hash.'/description';
          }

          $space->save();

          return redirect()->route('space.router', ['hash' => $hash, 'route' => 'description' ]);
        }


        /****************************
          Description Update - POST
        ****************************/
        if($route == 'description'){

          //Save Description Updates
          $space->title = $request->title;
          $space->description = $request->description;

          //
          if($space->public == 'no') {
            $space->notpublic = 'space/'.$hash.'/location';
          }

          $space->save();

          return redirect()->route('space.router', ['hash' => $hash, 'route' => 'location' ]);
        }


        /****************************
            Location Update - POST
        ****************************/
        if($route == 'location') {

          //Save Location Updates
          $space->country = $request->country;
          $space->city = $request->city;
          $space->address = $request->address;
          $space->location_references = $request->location_references;
          $space->zip = $request->zip;

          //
          if($space->public == 'no') {
            $space->notpublic = 'space/'.$hash.'/photos';
          }

          $space->save();

          return redirect()->route('space.router', ['hash' => $hash, 'route' => 'photos' ]);

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
            if($space->thumbnail != '/img/app/thumbnail.png') {
              File::delete($space->thumbnail);
            }

            // Filename
            $filename = $hash.'.'.$request->file('file')->getClientOriginalExtension();

            // Store in 'thumbnails' folder
            $request->file('file')->move('thumbnails/spaces', $filename);

            // Link recently updated with space, which is the owner
            $space->thumbnail = '/thumbnails/spaces/'.$filename;

            //
            if($space->public == 'no') {
              $space->notpublic = 'space/'.$hash.'/photos';
            }

              // Save new path
              $space->save();
            }

            return redirect()->route('space.router', ['hash' => $hash, 'route' => 'photos' ]);
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
              $new_path = '/photos/spaces/'.$filename;

              //Search if exists
              $search = Photo::where('path', $new_path)->first();

                if(!is_null($search)){
                  $search->delete();      //Delete if exists
                }

              // Move file to 'photos' folder
              $file->move('photos/spaces', $filename);

               //Save Photos Paths in DB
               $photo = new Photo;
               $photo->owner_hash = $hash;
               $photo->path = '/photos/spaces/'.$filename;
               $photo->save();
            }

          }

          return redirect()->route('space.router', ['hash' => $hash, 'route' => 'photos' ]);
        }


        /****************************
            Pricing Update - POST
        ****************************/
        if($route == 'pricing'){

          //Save Pricing Updates
          $space->price = $request->price;
          $space->per = $request->per;
          $space->currency = $request->currency;
          $space->save();

          //Public
          $space->public = 'yes';
          $space->notpublic = 'null';
          $space->save();

          //Return
          return redirect()->route('space.router', ['hash' => $hash, 'route' => 'extras' ]);
        }

        /****************************
            Extras Update - POST
        ****************************/
        if($route == 'extras'){

          /* Amenities */
          if($request->towels == 'yes') {
            $space->towels = $request->towels;
          }

          if($request->bed_sheets == 'yes') {
            $space->bed_sheets = $request->bed_sheets;
          }

          if($request->soap == 'yes') {
            $space->soap = $request->soap;
          }

          if($request->toilet_paper == 'yes') {
            $space->toilet_paper = $request->toilet_paper;
          }

          if($request->shampoo == 'yes') {
            $space->shampoo = $request->shampoo;
          }

          if($request->tv == 'yes') {
            $space->tv = $request->tv;
          }

          if($request->air_conditioning == 'yes') {
            $space->air_conditioning = $request->air_conditioning;
          }

          if($request->heating == 'yes') {
            $space->heating = $request->heating;
          }

          if($request->kitchen == 'yes') {
            $space->kitchen = $request->kitchen;
          }

          if($request->wifi == 'yes') {
            $space->wifi = $request->wifi;
          }

          if($request->iron == 'yes') {
            $space->iron = $request->iron;
          }

          if($request->breakfast == 'yes') {
            $space->breakfast = $request->breakfast;
          }

          /* Other */
          if($request->hot_tub == 'yes') {
            $space->hot_tub = $request->hot_tub;
          }

          if($request->washer == 'yes') {
            $space->washer = $request->washer;
          }

          if($request->pool == 'yes') {
            $space->pool = $request->pool;
          }

          if($request->dryer == 'yes') {
            $space->dryer = $request->dryer;
          }

          if($request->parking == 'yes') {
            $space->parking = $request->parking;
          }

          if($request->gym == 'yes') {
            $space->gym = $request->gym;
          }

          if($request->elevator == 'yes') {
            $space->elevator = $request->elevator;
          }

          if($request->workspace == 'yes') {
            $space->workspace = $request->workspace;
          }

          /* Special */
          if($request->family_kid_friendly == 'yes') {
            $space->family_kid_friendly = $request->family_kid_friendly;
          }

          if($request->smoking_allowed == 'yes') {
            $space->smoking_allowed = $request->smoking_allowed;
          }

          if($request->pets_allowed == 'yes') {
            $space->pets_allowed = $request->pets_allowed;
          }

          //
          $space->save();

          return redirect('/myspaces');
        }

    }

    /*
    public function destroy($hash)
    {
      //Search Space
      $space = Space::where('hash', $hash)->first();

      //Is it null?
      if(is_null($space)) {
        return view('errors.404');  //404 Not found
      }

      //Is it not the owner?
      if(Auth::user()->id != $space->user_id) {
        return view('errors.400'); //400 Bad Request
      }

      // Delete thumnail
      if($space->thumbnail != '/img/app/thumbnail.png') {
        File::delete($space->thumbnail);
      }

        //Search Gallery
        $photos = DB::table('photos')->where('owner_hash', $space->hash);

      // Delete all photos
      foreach ($photos as $photo) {
        File::delete($photo->path);
      }

      // Delete all rows
      $photos = DB::table('photos')->where('owner_hash', $space->hash)->delete();

      // Delete Space
      $space->delete();

      // Redirect
      return back();
    }*/


    /****************************
         TODO - validation
    ****************************/
    /*
    public function Validar($space)
    {
        if($space->capacity or $space->bedrooms or $space->beds or $space->bathrooms == 'null') {
          $space->public == 'no';
          $space->notpublic = 'space/'.$hash.'/basics';
          $space->save();
          return redirect('space/'.$hash.'/basics');
        }

        if($space->title or $space->description == 'null' or ' ') {
          $space->public == 'no';
          $space->notpublic = 'space/'.$hash.'/description';
          $space->save();
          return redirect('space/'.$hash.'/description');
        }

        if($space->country or $space->city or $space->address or $space->location_references == 'null' or ' ') {
          $space->public == 'no';
          $space->notpublic = 'space/'.$hash.'/location';
          $space->save();
          return redirect('space/'.$hash.'/location');
        }

        if($space->thumbnail == '/img/app/thumbnail.png') {
          $space->public == 'no';
          $space->notpublic = 'space/'.$hash.'/photos';
          $space->save();
          return redirect('space/'.$hash.'/photos');
        }

        if($space->price or $space->per or $space->coin == 'null' ) {
          $space->public == 'no';
          $space->notpublic = 'space/'.$hash.'/pricing';
          $space->save();
          return redirect('space/'.$hash.'/pricing');
        }
    }*/

}
