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
          Create - POST
    ****************************/
    public function create(Request $request)
    {
      //Identifier
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

      //Redirect to Basic
      return redirect('space/'.$hash.'/basics');
    }

    /*******************
        Basics - GET
    *******************/
    public function basics($hash)
    {
      //Search Space
      $space = Space::where('hash', $hash)->first();

      //Is it null?
      if(is_null($space)) {
        return view('errors.404'); //404 Not found
      } //If Null

      //Is it not the owner?
      if(Auth::user()->id != $space->user_id) {
        return view('errors.400'); //400 Bad Request
      }

      //Return with space
      return view('spaces/create.basics', ['space' => $space]);
    }

    /*******************
      Description - GET
    ********************/
    public function description($hash)
    {
      //Search Space
      $space = Space::where('hash', $hash)->first();

      //Is it null?
      if(is_null($space)) {
        return view('errors.404'); //404 Not found
      } //If Null

      //Is it not the owner?
      if(Auth::user()->id != $space->user_id) {
        return view('errors.400'); //400 Bad Request
      }

      //Return with space
      return view('spaces/create.description', ['space' => $space]);
    }

    /*******************
      Location - GET
    ********************/
    public function location($hash)
    {
      //Search Space
      $space = Space::where('hash', $hash)->first();

      //Is it null?
      if(is_null($space)) {
        return view('errors.404'); //404 Not found
      } //If Null

      //Is it not the owner?
      if(Auth::user()->id != $space->user_id) {
        return view('errors.400'); //400 Bad Request
      }

      //Return with space
      return view('spaces/create.location', ['space' => $space]);
    }

    /*******************
        Photos - GET
    ********************/
    public function photos($hash)
    {
      //Search Space
      $space = Space::where('hash', $hash)->first();

      //Is it null?
      if(is_null($space)) {
        return view('errors.404'); //404 Not found
      } //If Null

      //Is it not the owner?
      if(Auth::user()->id != $space->user_id) {
        return view('errors.400'); //400 Bad Request
      }

      //Return Gallery
      $photos = DB::table('photos')->where('owner_hash', $space->hash)->get();

      //Return with space & Photos
      return view('spaces/create.photos', ['space' => $space, 'photos' => $photos]);
    }


    /*******************
        Pricing - GET
    ********************/
    public function pricing($hash)
    {
      //Search Space
      $space = Space::where('hash', $hash)->first();

      //Is it null?
      if(is_null($space)) {
        return view('errors.404'); //404 Not found
      } //If Null

      //Is it not the owner?
      if(Auth::user()->id != $space->user_id) {
        return view('errors.400'); //400 Bad Request
      }

      //Return with space
      return view('spaces/create.pricing', ['space' => $space]);
    }

    /***********************
      Basics Update - POST
    ************************/
    public function updateBasics(Request $request, $hash)
    {
        //Search Space by hash
        $space = Space::where('hash', $hash)->first();

        //If Null
        if(is_null($space)) {
          return "400"; //Bad request
        }

        //Save Basics Updates
        $space->type = $request->type;
        $space->accomodance = $request->accomodance;
        $space->capacity = $request->capacity;
        $space->bedrooms = $request->bedrooms;
        $space->beds = $request->beds;
        $space->bathrooms = $request->bathrooms;

        if($space->public == 'no') {
          $space->notpublic = 'space/'.$hash.'/description';
        }
          //
        $space->save();

        return redirect('space/'.$hash.'/description');
    }

    /****************************
      Description Update - POST
    ****************************/
    public function updateDescription(Request $request, $hash)
    {
        //Search Space by hash
        $space = Space::where('hash', $hash)->first();

        //If Null
        if(is_null($space)) {
          return "400"; //Bad request
        }

        //Save Basics Updates
        $space->title = $request->title;
        $space->description = $request->description;

        if($space->public == 'no') {
          $space->notpublic = 'space/'.$hash.'/location';
        }
          //
        $space->save();

        return redirect('space/'.$hash.'/location');
    }

    /****************************
        Location Update - POST
    ****************************/
    public function updateLocation(Request $request, $hash)
    {
        //Search Space by hash
        $space = Space::where('hash', $hash)->first();

        //If Null
        if(is_null($space)) {
          return "400"; //Bad request
        }

        //Save Basics Updates
        $space->country = $request->country;
        $space->city = $request->city;
        $space->address = $request->address;
        $space->location_references = $request->location_references;
          $space->zip = $request->zip;

        if($space->public == 'no') {
          $space->notpublic = 'space/'.$hash.'/photos';
        }
          //
        $space->save();

        return redirect('space/'.$hash.'/photos');
    }

    /****************************
      Thumbnail Update - POST
    ****************************/
    public function updateThumbnail(Request $request, $hash) {
      //Search Space
      $space = Space::where('hash', $hash)->first();

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
        $request->file('file')->move('thumbnails', $filename);

        // Link recently updated with space, which is the owner
        $space->thumbnail = '/'.'thumbnails/'.$filename;

        //
        if($space->public == 'no') {
          $space->notpublic = 'space/'.$hash.'/photos';
        }

          // Save new path
          $space->save();
        }

        return redirect('space/'.$hash.'/photos');
    }

    /****************************
        Gallery Update - POST
    ****************************/
    public function updateGallery(Request $request, $hash) {
      //Search Space by hash
      $space = Space::where('hash', $hash)->first();

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
          $new_path = '/photos'.'/'.$filename;

          //Search if exists
          $search = Photo::where('path', $new_path)->first();

            if(!is_null($search)){
              $search->delete();      //Delete if exists
            }

          // Move file to 'photos' folder
          $file->move('photos', $filename);

           //Save Photos Paths in DB
           $photo = new Photo;
           $photo->owner_hash = $hash;
           $photo->path = '/photos'.'/'.$filename;
           $photo->save();
        }

      }

      return redirect('space/'.$hash.'/photos');
  }

    /****************************
        Pricing Update - POST
    ****************************/
    public function updatePricing(Request $request, $hash)
    {
        //Search Space by hash
        $space = Space::where('hash', $hash)->first();

        //If Null
        if(is_null($space)) {
          return "400"; //Bad request
        }

        //Save Basics Updates
        $space->price = $request->price;
        $space->per = $request->per;
        $space->coin = $request->coin;
        $space->save();
        /*
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
        }*/

        //Public
        $space->public = 'yes';
        $space->notpublic = 'null';
        $space->save();

        //Return
        return redirect('/myspaces');
    }

    /****************************
            Show Space
    ****************************/
    public function show($hash)
    {
        $space = Space::where('hash', $hash)->first();

        //If Null
        if(is_null($space)) {
            return "404";
        }

        $photos = DB::table('photos')->where('owner_hash', $space->hash)->get();

        return view('spaces.show', ['space' => $space, 'photos' => $photos ]);
    }

}
