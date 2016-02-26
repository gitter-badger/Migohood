<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Http\Controllers\Controller;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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

    // Spaces
    public function spaces() {
        return view('app.spaces');
    }

    // Create - Get
    public function getcreate() {
        return view('app.create');
    }

    // Create - Post
    public function postcreate(Request $request) {
        return $request->typeof;
    }



}
