<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use Input;
use File;
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

       if(Auth::check()) {                            // Check if user is authenticated
          if(Auth::user()->role == 'user') {          // Redirect User
            return redirect ('/app/get/spaces');
          }

          if(Auth::user()->role == 'admin') {         // Redirect Admin to Panel
            return redirect ('/admin/panel');
          }
       }

        return view('errors.400');                    // 400 Bad Request
    }


    // Get Resource
    public function getResource($resource) {
       $search = DB::table($resource)
                      ->where('status', 'listed')
                      ->orderBy('created_at', 'desc')
                      ->paginate(12);

       return view('app.'.$resource, ['resources' => $search ]);
    }


    // Get Route
    public function getRoute($base, $route) {
        // Users/Folder/View
        return view('users/'.$base.'/'.$route, ['route' => $route]);
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
          $space->type = $request->type;                  // Type of Property
          $space->room = $request->room;                  // Type of Room
          $space->save();                                 // Save

          // Create a New Notification
          $this->createNotification('new', 'space', $space->hash);

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

      // Save Request if it's Space
      if($resource == 'space') {
        $this->SpaceUpdate($request, $hash, $route);
      }

      /*if($resource == 'workspace') {
        $this->WorkspaceUpdate($request, $hash, $route);
      }*/


      // Redirect if it latest
      if($next == 'finish') {
        return redirect()->route('route', [
          'base'=> 'dashboard',
          'route' => 'my'.$resource.'s'
        ]);
      }

      // Or Redirect to next route
      return redirect()->route('resource.router', [
        'resource' => $resource,
        'hash' => $hash,
        'route' => $request->next
      ]);

    }


    // Resource Thumbnail - POST
    public function resourceThumbnailUpload($resource, $hash) {

      // If there's a file in the Request, proceed
      if (Input::hasFile('pic')) {

        // Search hash in the table of the resource
          if($resource == 'space') {
            $search = Space::where('hash', $hash)->first();
          }

          /*
          if($resource == 'workspace'){
            $search = Workspace::where('hash', $hash)->first();
          }*/

        $path = 'uploads/thumbnails/'.$resource.'s/';       // Path

        // If thumbnail is default, do not delete, otherwise do it
        if($search->thumbnail != '/img/app/thumbnail.png') {
            if(File::exists($path.$search->thumbnail)) {
              File::delete($path.$search->thumbnail);       // Delete if exists
            }
        }

        $file = Input::file('pic');           // File
        $filename = time().'_'.$hash.'.'.$file->getClientOriginalExtension();   // Filename
        $file->move($path, $filename);        // Move to Path

        $search->thumbnail = $filename;       // Set new thumbnail to resource
        $search->save();                      // Save resource
      }

      return back();
    }


    // Resource Gallery - POST
    public function resourceGalleryUpload($resource, $hash) {

      // If there are file's in the Request, proceed
      if (Input::hasFile('file')) {

        // Search hash in the table of the resource
          if($resource == 'space') {
            $search = Space::where('hash', $hash)->first();
          }

          /*
          if($resource == 'workspace'){
            $search = Workspace::where('hash', $hash)->first();
          }*/

        $path = 'uploads/galleries/'.$resource.'s/';    // Path
        $files = Input::file('file');                   // Files

        $i = '1';                                       // Count

        // Upload each image to the directory and return the filepath
        foreach($files as $file) {
          $filename = $i++.'_'.time().'_'.$hash.'.'.$file->getClientOriginalExtension();  // Filename
          $file->move($path, $filename);          // Move to path

          $photo = new Photo;                     // New Photo in DB
          $photo->resource = $resource;           // Type of Resouce
          $photo->hash = $hash;                   // Hash of the resource
          $photo->filename = $filename;           // Filename
          $photo->save();                         // Save
        }
      }

      return back();                              // Return Back
    }


    /****************************
          Extra Functions
    ****************************/
    // Create Hash
    public function createHash($resource) {
      do {  $hash = str_random(14);                           // Create hash
            $search = DB::table($resource.'s')                // Search hash in the table of the resource
                          ->where('hash', $hash)->first();
      } while (!is_null($search));                            // Do while search != null

      return $hash;
    }


    // Create Notification
    public function createNotification($type, $resource, $hash) {

        $notification = new Notification;                 // New Notification
        $notification->user_id = Auth::user()->id;        // Assign user id

        // Create Custom Notifications
        if($type == 'new') {
          $notification->description = 'New '.$resource.' has been created';
          $notification->link = '/app/dashboard/my'.$resource.'s';
        }

        if($type == 'listed') {
          $notification->description = 'Your '.$resource.' is listed now!';
          $notification->link = '/app/dashboard/my'.$resource.'s';
        }

        $notification->save();                            // Save Notification
    }


    // Get Img from Storage
    public function getImgFromStorage($folder, $resource, $filename) {
      $path = 'uploads/'.$folder.'/'.$resource.'s/';              // Path
      if(File::exists($path.$filename)) {                         // Search if exists
        return redirect('/'.$path.$filename);                     // Return with path
      }
      return redirect('/img/app/thumbnail.png');                  // Return default to prevent Errors
    }


    // Delete Img from Storage
    public function deleteImgFromStorage($folder, $resource, $filename) {
      $path = 'uploads/'.$folder.'/'.$resource.'s/';              // Path
      if(File::exists($path.$filename)) {                         // Search if exists
        File::delete($path.$filename);                            // Delete real Path
        Photo::where('filename', $filename)->first()->delete();   // Found row in DB and Delete
      }
      return back();                                              // Return back
    }


    /****************************
          Spaces Posting
    ****************************/
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

       }

      $space->save();                 // Save latest inputs
      $this->validateSpace($hash);    // Validations for listing the space
      return $space;                  // Return Space
    }


    // Space Validate
    public function validateSpace($hash) {
      $space = Space::where('hash', $hash)->first();     // Search Space

      if( !is_null($space->title) and
          !is_null($space->description) and
          !is_null($space->city_id) and
          !is_null($space->address) and
          !is_null($space->location_references) and
          !is_null($space->price) and
          !is_null($space->per) and
          !is_null($space->check_in) and
          !is_null($space->check_out) and
          ($space->thumbnail != '/img/app/thumbnail.png')
        ) {
            $space->status = 'listed';                                // If valid, then listed
            $space->save();                                           // Save Status
            $this->createNotification('listed', 'space', $hash);      // Create a New Notification
          }

    }


}
