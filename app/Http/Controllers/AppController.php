<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use File;
use Input;

use App\Space;
use App\Notification;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
   /****************************
          Extra Functions
   ****************************/
    // Redirect
    public function getRedirect() {

       if(Auth::check()){
          // Redirect User
          if(Auth::user()->role == 'user') {
            return redirect ('/spaces');
          }

          // Redirect Admin to Panel
          if(Auth::user()->role == 'admin') {
            return redirect ('/admin/panel');
          }
       }

        return view('errors.400'); //400 Bad Request
    }

    // Get Resource
    public function getResource($resource) {
        return view('app.'.$resource); // TODO Search and return -> resource;
    }

    // Get Route
    public function getRoute($base, $route){
        // User/Folder/View
        return view('users/'.$base.'/'.$route, ['route' => $route]);
    }

    // Create Notification
    public function createNotification($type, $hash) {
        // New Notification
        $notification = new Notification;
        $notification->type = $type;
        $notification->user_id = Auth::user()->id;

        // Create Custom Notifications

        if($type == 'new-space'){
          $notification->description = 'New Space has been created';
          $notification->link = '/dashboard/myspaces';
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
      } while (!is_null($search));                            //Do while search != null

      return $hash;
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

      /*
      // Is it null?
      if(is_null($search)) {
          return view('errors.404'); // 404 Resource Not Found
      }

      //Is it not the owner?
      if(Auth::user()->id != $search->user_id) {
          return view('errors.400'); // 400 Bad request
      }*/

      // Save Request if it's Space
      if($resource == 'space') {
        $search = $this->SpaceUpdate($request, $hash, $route);
      }

      /*if($resource == 'workspace') {
        $search = $this->WorkspaceUpdate($request, $hash, $route);
      }*/

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

      /* TODO: validate here some like:
        public function SpaceValidate($hash) {
          // Search Space
          $space = Space::where('hash', $hash)->first();

          if(...)

          return 'not_listed' or 'listed'

        }
        */

      $space->save();

      return $space;
    }

    // Resource Router - POST
    public function resourceThumbnailUpload($resource, $hash) {

      // If is there a file in the Request, proceed:
      if(Input::hasFile('file')) {

          // Search hash in the table of the resource
          if($resource == 'space'){
            $search = Space::where('hash', $hash)->first();
          }

          // If thumbnail is default, do not delete, otherwise do it
          if($search->thumbnail != '/img/app/thumbnail.png') {
            File::delete(public_path().$search->thumbnail);
          }

          // Upload an image to the directory and return the filepath
          $file = Input::file('file');                                          // File
          $filepath = '/photos/thumbnails/'.$resource.'s/';                     // Filepath
          $filename = time().'_'.$hash.'.'.$file->getClientOriginalExtension(); // Filename
          $file->move(public_path().$filepath, $filename);                      // Move to folder

          $search->thumbnail = $filepath.$filename;                             // Set new thumbnail to resource
          $search->save();                                                      // Save resource

          return response()->json(['path'=> $search->thumbnail], 200);          // Return response
      }
      // Otherwise,
      else {
        return response()->json(false, 200);
      }
    }


}
