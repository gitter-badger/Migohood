<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    // Admin
    public function panel() {
      // Redirect Admin and Workers
      if(Auth::user()->role == 'admin') {
        return view("admin.panel");
      }

      return view('errors.400'); //400 Bad Request

    }

}
