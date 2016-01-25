<?php

namespace App\Http\Controllers\Posts;

use Illuminate\Http\Request;
use App\Place;
use App\User;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    public function index()
    {
        //
    }

    //Create Post
    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        //
    }

    /*******************
          Spaces ...
    *******************/
    // Show
    public function showSpace($hash)
    {
      //Get the place
      $space = Place::where('hash', $hash)->first();

      //Get the Owner
      $owner = $space->user;

      return view('spaces.show', ['space' => $space, 'owner' => $owner ]);

    }

    /**
    * Create
    */

    //Choose (Step 1)
    public function Space(Request $request) {
      //Send Initial Choice
      return view('spaces.basic')->with('previous', $request);
    }

    //Store Space (Step 2)
    public function SpaceBasic(Request $request)
    {
      //Identifier
      $hash = str_random(30);
      $search = Place::where('hash', $hash)->first();

      //If Hash exists, Rehash
      if(!is_null($search)) {
        $hash = str_random(30);
      }

      //Type is Other?
      if($request->type=='Other') { //Then Save default title and Category
        $def_title = $request->type.' ('.$request->other.') / '.$request->accomodance;
        $other = $request->other;
      }
      else { //Anyway save default title but no Category
        $def_title = $request->type.' / '.$request->accomodance;
        $other = 'NULL';
      }

      //Next Path
      $uri = 'space/' . $hash . '/main';

      //Create Place
      $request->user()->places()->create([
        'hash' => $hash,
        'type' => $request->type,
        'other' => $other,
        'accomodance' => $request->accomodance,
        'capacity' => $request->capacity,
        'bedrooms' => $request->bedrooms,
        'beds' => $request->beds,
        'bathrooms' => $request->bathrooms,
        'def_title' => $def_title,

        'where'=> $uri,
      ]);

      // Redirect
      return Redirect($uri);
    }

    // Store (Step 3)
    public function SpaceMain($hash)
    {
      //Get the place
      $space = Place::where('hash', $hash)->first();

      return view('spaces.main', ['space' => $space ]);

    }

    /*******************
          Services ...
    *******************/
    //Store
    public function ServiceStore(Request $request)
    {
      /*
      $Type = $request->type;

      //Debugging
      if($Type!='Other') {
        return 'Type: '.$request->type.' - Other: null - Title: '.$request->title.' - Description: '.$request->title;
      }
      else {
        return 'Type: '.$request->type.' - Other: '.$request->other.' - Title: '.$request->title.' - Description: '.$request->title;
      }*/

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
