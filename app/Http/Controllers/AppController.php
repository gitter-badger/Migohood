<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;

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

          // Redirect Admin and Workers
          if(Auth::user()->role == 'admin' || Auth::user()->role == 'worker') {
            return redirect ('/admin/panel');
          }
       }

        return view('errors.400'); //400 Bad Request
    }

    // Get Resource
    public function getResource($resource) {
        return view('app.'.$resource);
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

      // Is it null?
      if(is_null($search)) {
          return view('errors.404'); // 404 Resource Not Found
      }

      //Is it not the owner?
      if(Auth::user()->id != $search->user_id) {
          return view('errors.400'); // 400 Bad request
      }

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

      // Space - Description
      if($route == 'location') {
        
      }

      $space->save();

      return $space;
    }

}
