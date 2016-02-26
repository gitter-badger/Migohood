<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    // Admin
    public function panel() {
      // Redirect Admin and Workers
      if(Auth::user()->role == 'admin' || Auth::user()->role == 'worker') {
        return view("admin.panel");
      }

      return view('errors.400'); //400 Bad Request

    }

}
