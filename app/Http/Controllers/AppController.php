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
   public function getredirect() {

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

   // Get Route (Spaces, Workspaces, Parking Lots, Services)
    public function getroute($route) {
       return view('app.'.$route, ['route' => $route]);
    }

    // Notification Creator
    public function createNotification($type) {
      // New Notification
      $notification = new Notification;
      $notification->type = $type;
      $notification->user_id = Auth::user()->id;

      if($type == 'new-space'){
        $notification->description = 'New Space has been created';
        $notification->link = 'null';
      }

      // Save Notification
      $notification->save();
    }

    // Hasher
    public function hasher($resource) {
      do {  $hash = str_random(12);                           // Create hash
            $search = DB::table($resource.'s')                // Search hash in resource's table
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
        $space->hash = $this->hasher($resource);
        $space->user_id = Auth::user()->id;
        $space->type = $request->type;
        $space->room = $request->room;
        $space->save();

        // Create a New Notification
        $this->createNotification('new-space');

        return $space->hash;

        // Redirect -> edit Basics
      }

    }

}
