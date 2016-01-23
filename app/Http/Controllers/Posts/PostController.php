<?php

namespace App\Http\Controllers\Posts;

use Illuminate\Http\Request;
use App\Place;
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

    //Store
    public function Space(Request $request) {


    /*
      $request->user()->places()->create([
        'default_title' => $request->type.'/'.$request->accomodance,
        'type' => $request->type,
        'accomodance' => $request->accomodance,
      ]);*/

      // Redirect
      //$space = Place::where(['default_title'=>$request->name])->firstOrFail();

      //Send Initial Choice
      return view('spaces.main')->with('previous', $request);

      //return Redirect('places/' . $place->id );


    //return $request;
    }


    //Store
    public function SpaceMain(Request $request) {

      if($request->type=='Other') {
        return $request->other;
      }

      return $request->type.'.'.$request->accomodance.' '.$request->capacity;
    /*
      $request->user()->places()->create([
        'default_title' => $request->type.'/'.$request->accomodance,
        'type' => $request->type,
        'accomodance' => $request->accomodance,
      ]);*/

      // Redirect
      //$space = Place::where(['default_title'=>$request->name])->firstOrFail();

      //Send Initial Choice
      //return view('spaces.main')->with('previous', $request);

      //return Redirect('places/' . $place->id );


    //return $request;
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
