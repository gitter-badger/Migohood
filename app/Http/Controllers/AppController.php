<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use Input;
use File;
use Storage;
use Response;

use App\Space;
use App\Notification;
use App\Photo;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
    /****************************
         Resources Functions
    ****************************/


    // Redirect
    public function getRedirect() {
       // Check if user is authenticated
       if(Auth::check()) {

          // Redirect User
          if(Auth::user()->role == 'user') {
            return redirect ('/app/get/spaces');
          }

          // Redirect Admin to Panel
          if(Auth::user()->role == 'admin') {
            return redirect ('/admin/panel');
          }

       }

        return view('errors.400'); //400 Bad Request
    }


    // Get Resource
    public function getResource($resource){

       // Get Spaces
       if($resource = 'spaces') {

          $search = DB::table('spaces')
                      ->where('status','listed')
                      ->orderBy('created_at', 'desc')
                      ->paginate(6);

          return view('app.spaces', ['resources' => $search]);

       }

    }


    // Get Route
    public function getRoute($base, $route){
        // Users/Folder/View
        return view('users/'.$base.'/'.$route, ['route' => $route]);
    }


    /****************************
          Extra Functions
    ****************************/
    // Create Notification
    public function createNotification($type, $hash) {
        // New Notification
        $notification = new Notification;
        $notification->type = $type;
        $notification->user_id = Auth::user()->id;

        // Create Custom Notifications

        if($type == 'new-space'){
          $notification->description = 'New Space has been created';
          $notification->link = '/app/dashboard/myspaces';
        }

        if($type == 'space-listed'){
          $notification->description = 'Your Space is listed now!';
          $notification->link = '/app/dashboard/myspaces';
        }

        /*
        if($type == 'new-workspace'){

        } */

        // Save Notification
        $notification->save();
    }


    // Create Hash
    public function createHash($resource) {
      do {  $hash = str_random(14);                           // Create hash
            $search = DB::table($resource.'s')                // Search hash in the table of the resource
                          ->where('hash', $hash)->first();
      } while (!is_null($search));                            // Do while search != null

      return $hash;
    }


    // Get Img from Storage
    public function getImgFromStorage($folder, $resource, $filename) {
      $path = storage_path().'/app/'.$folder.'/'.$resource.'s/'.$filename;

      $file = File::get($path);
      $type = File::mimeType($path);

      $response = Response::make($file, 200);
      $response->header("Content-Type", $type);

      return $response;
    }


    /****************************
          Create Functions
    ****************************/


    // Create - Get
    public function getcreate() {
       return view('app.create');
    }


    // Create - Post
    public function postcreate(Request $request, $resource) {

      // Space - Post
      if($resource == 'space') {
          // Create Space
          $space = new Space;
          $space->hash = $this->createHash($resource);    // Identifier (hash)
          $space->user_id = Auth::user()->id;             // User who owns the space
          $space->type = $request->type;                  // Type of Space
          $space->room = $request->room;

          $space->save();

          // Create a New Notification
          $this->createNotification('new-space', $space->hash);

          return redirect()->route('resource.router', [
            'resource' => $resource,
            'hash' => $space->hash,
            'route' => 'basics'
          ]);
      }

      /*
      if($resource == 'workspace') {

      }
      */
    }


    // Resource Router - Get
    public function resourceRouter($resource, $hash, $route) {

      // Search hash in the table of the resource
      $search = DB::table($resource.'s')
                      ->where('hash', $hash)->first();

      // Is it null?
      if(is_null($search)) {
          return view('errors.404'); // 404 Resource Not Found
      }

      //Is it not the owner?
      if(Auth::user()->id != $search->user_id) {
          return view('errors.400'); // 400 Bad request
      }

      // Redirects
      // Ex. resources/spaces/edit/basics
      return view('resources/'.$resource.'s'.'/edit'.'.'.$route, [
        'resource' => $search,
        'route' => $route
      ]);

    }


    // Resource Router - POST
    public function resourceRouterUpdate(Request $request, $resource, $hash, $route, $next) {

      // Search hash in the table of the resource
      $search = DB::table($resource.'s')
                      ->where('hash', $hash)->first();

      // Save Request if it's Space
      if($resource == 'space') {
        $search = $this->SpaceUpdate($request, $hash, $route);
      }

      /*if($resource == 'workspace') {
        $search = $this->WorkspaceUpdate($request, $hash, $route);
      }*/


      // !!!
      if($next == 'finish') {

        return redirect()->route('route', [
          'base'=> 'dashboard',
          'route' => 'myspaces'
        ]);
      }


      // Redirect
      return redirect()->route('resource.router', [
        'resource' => $resource,
        'hash' => $search->hash,
        'route' => $request->next
      ]);

    }


    // Space Update - POST
    public function SpaceUpdate(Request $request, $hash, $route) {
      // Search Space
      $space = Space::where('hash', $hash)->first();

      // Space - Basics
      if($route == 'basics') {
        $space->type = $request->type;
        $space->room = $request->room;
        $space->capacity = $request->capacity;
        $space->bedrooms = $request->bedrooms;
        $space->beds = $request->beds;
        $space->bathrooms = $request->bathrooms;
      }

      // Space - Description
      if($route == 'description') {
        $space->title = $request->title;
        $space->description = $request->description;
        $space->pets_allowed = $request->pets_allowed;
        $space->events_allowed = $request->events_allowed;
        $space->production_allowed = $request->production_allowed;
        $space->family_friendly = $request->family_friendly;
        $space->business_guest = $request->business_guest;
        $space->smoke_free = $request->smoke_free;
        $space->gym = $request->gym;
        $space->parking = $request->parking;
      }

      // Space - Location
      if($route == 'location') {
        $space->city_id = $request->city;
        $space->address = $request->address;
        $space->location_references = $request->location_references;
        $space->latitude = $request->latitude;
        $space->longitude = $request->longitude;
      }

      // Space - Price
      if($route == 'price') {
        $space->price = $request->price;
        $space->per = $request->per;
        $space->currency = $request->currency;
        $space->check_in = $request->check_in;
        $space->check_out = $request->check_out;
      }

      // Space - Extras
      if($route == 'extras') {
        $space->towels = $request->towels;
        $space->bed_sheets = $request->bed_sheets;
        $space->soap = $request->soap;
        $space->shampoo = $request->shampoo;
        $space->toilet_paper = $request->toilet_paper;
        $space->towels = $request->towels;
        $space->cleaning_kit = $request->cleaning_kit;
        $space->iron = $request->iron;
        $space->hair_dryer = $request->hair_dryer;
        $space->elevator = $request->elevator;
        $space->hot_tub = $request->hot_tub;
        $space->washer = $request->washer;
        $space->dishwasher = $request->dishwasher;

        $space->wheelchair_access = $request->wheelchair_access;
        $space->AC = $request->AC;
        $space->heat = $request->heat;
        $space->ByB = $request->ByB;
        $space->workspace = $request->workspace;
        $space->pool = $request->pool;
        $space->sauna = $request->sauna;
        $space->terrace = $request->terrace;
        $space->wheelchair_access = $request->wheelchair_access;
        $space->chef = $request->chef;
        $space->translator = $request->translator;
        $space->flexible_check_in = $request->flexible_check_in;
        $space->flexible_check_out = $request->flexible_check_out;

        // !!
        $this->validateResource('space', $hash);
       }


       // $this->validateResource('space', $hash);

      $space->save();

      return $space;
    }


    // Resource Thumbnail - POST
    public function resourceThumbnailUpload($resource, $hash) {

      // If is there a file in the Request, proceed:
      if(Input::hasFile('file')) {

          // Search hash in the table of the resource
          if($resource == 'space'){
            $search = Space::where('hash', $hash)->first();
          }

          /*
          if($resource == 'workspace'){
            $search = Workspace::where('hash', $hash)->first();
          }*/

          // If thumbnail is default, do not delete, otherwise do it
          if($search->thumbnail != '/img/app/thumbnail.png') {
              Storage::delete('/thumbnails/'.$resource.'s/'.$search->thumbnail);
          }

          // Upload an image to the directory and return the filepath
          $file = Input::file('file');                                            // File
          $filename = time().'_'.$hash.'.'.$file->getClientOriginalExtension();   // Filename
          Storage::put(                                                           // Move to folder
                        'thumbnails/'.$resource.'s/'.$filename,                   // Filepath
                        file_get_contents($file->getRealPath())                   // Save img
          );

          $search->thumbnail = $filename;         // Set new thumbnail to resource
          $search->save();                        // Save resource

          // Return response
          return response()->json(['file_name'=> $filename, 'resource' => $resource ], 200);
      }
      // Otherwise,
      else {
        return response()->json(false, 200);
      }
    }


    // Resource Gallery - POST
    public function resourceGalleryUpload(Request $request, $resource, $hash) {

      // If is there a file in the Request, proceed
      if (Input::hasFile('file')) {

        // Search hash in the table of the resource
        if($resource == 'space'){
          $search = Space::where('hash', $hash)->first();
        }

        /*
        if($resource == 'workspace'){
          $search = Workspace::where('hash', $hash)->first();
        }*/

        $files = Input::file('file');   // Files

        $i = '1';                       // Count

        foreach($files as $file) {    // Upload an image to the directory and return the filepath
          $filename = $i++.'_'.time().'_'.$hash.'.'.$file->getClientOriginalExtension();  // Filename
          Storage::put(                                           // Move to folder
                        'galleries/'.$resource.'s/'.$filename,    // File path
                        file_get_contents($file->getRealPath())   // Save img
          );

          //Save Photos Paths in DB
          $photo = new Photo;                     // New Photo in DB
          $photo->resource = $resource;           // Type of Resouce
          $photo->hash = $hash;                   // Hash of the resource
          $photo->path = $filename;               // Filename
          $photo->save();                         // Save

        }

        // Return response
        return back();
      }
      else {
        return back();
      }

    }


    // Validate Resources
    public function validateResource($resource, $hash) {

      // Spaces
      if($resource == 'space'){
        // Search Space
        $search = Space::where('hash', $hash)->first();

        // TODO SOME VALIDATION HERE
        $search->status = 'listed';     // If valid, then listed
        $search->save();                // Save Status

        // Create a New Notification
        $this->createNotification('space-listed', $hash);
      }

      /* TODO: validate here some like:
        public function SpaceValidate($hash) {
          // Search Space
          $space = Space::where('hash', $hash)->first();

          if(...)

          return 'not_listed' or 'listed'

        }
        */

    }


}
