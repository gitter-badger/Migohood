<?php

namespace App\Http\Controllers\Posts;

use Illuminate\Http\Request;
use App\Place;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /*
    * Routes for Spaces...
    */
    //Store
    public function PlaceStore(Request $request)
    {
      //Debugging
      return 'Type: '.$request->type.' - Acommodance: '.$request->accomodance.' - Capacity: '.$request->capacity.' - Country: '.$request->country;

      /*
      switch ($request->type) {
        case 1:
          $title = "Department";
        break;
        case 2:
          $title = "Department";
        break;
        case 3:
          $title = "Room &amp; Breakfast";
        break;
      }

      $request->user()->places()->create([
          'title' => 'No title',
          'type' => $request->type,
      ]);

      return $title;*/

      //return Redirect('places/' . $place->id );
    }

    /*
    * Routes for Services...
    */
    //Store
    public function ServiceStore(Request $request)
    {
      $Type = $request->type;

      //Debugging
      if($Type!='Other') {
        return 'Type: '.$request->type.' - Other: null - Title: '.$request->title.' - Description: '.$request->title;
      }
      else {
        return 'Type: '.$request->type.' - Other: '.$request->other.' - Title: '.$request->title.' - Description: '.$request->title;
      }

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
