<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Space;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Create
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
        'link' => 'space/'.$hash.'/basics',
        'public' => 'NO',
      ]);

      //Redirect to Basic
      return redirect('space/'.$hash.'/basics');
    }

    //Basics
    public function basics($hash)
    {
        $space = Space::where('hash', $hash)->first();

        //If Hash exists, Rehash
        if(is_null($space)) {
          return "404";
        }

        return view('spaces.basics', ['space' => $space]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
