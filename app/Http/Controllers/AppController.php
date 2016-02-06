<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;

use App\Space;
use App\Office;
use App\Service;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
      //Spaces
      public function spaces() {
        return View('app.spaces');
      }

      //Services
      public function services() {
        return View('app.services');
      }

      //Dashboard
      public function Dashboard() {
        return view('users.dashboard');
      }

      /*******************
            Inbox
      *******************/
     //Inbox
     public function Inbox()
     {
       return view('users/inbox.received');
     }

     //Inbox - Sent
     public function InboxSent()
     {
       return view('users/inbox.sent');
     }

     //Inbox - Trash
     public function InboxArchived()
     {
       return view('users/inbox.archived');
     }

    /*******************
          My Spaces
    *******************/
    //MySpaces - Listed
    public function MySpacesListed()
    {
      $spaces = DB::table('spaces')
                  ->where('user_id', Auth::user()->id)
                  ->where('public', 'yes')->get();
      return view('users/spaces.listed', ['spaces' => $spaces]);
    }

    //MySpaces - Not Listed
    public function MySpacesNotListed()
    {
      $spaces = DB::table('spaces')
                  ->where('user_id', Auth::user()->id)
                  ->where('public', 'no')->get();
      return view('users/spaces.notlisted', ['spaces' => $spaces]);
    }

    /*******************
          My Offices
    *******************/
   //MyOffices - Listed
   public function MyOfficesListed()
   {
     $offices = DB::table('offices')
                 ->where('user_id', Auth::user()->id)
                 ->where('public', 'yes')->get();
     return view('users/offices.listed', ['offices' => $offices]);
   }

   //MySpaces - Not Listed
   public function MyOfficesNotListed()
   {
     $offices = DB::table('offices')
                 ->where('user_id', Auth::user()->id)
                 ->where('public', 'no')->get();
     return view('users/offices.notlisted', ['offices' => $offices]);
   }

     /*******************
         My Services
     *******************/
    //MyServices - Listed
    public function MyServicesListed()
    {
      $services = DB::table('services')
                  ->where('user_id', Auth::user()->id)
                  ->where('public', 'yes')->get();
      return view('users/services.listed', ['services' => $services]);
    }

    //MyServices - Not Listed
    public function MyServicesNotListed()
    {
      $services = DB::table('services')
                  ->where('user_id', Auth::user()->id)
                  ->where('public', 'no')->get();
      return view('users/services.notlisted', ['services' => $services]);
    }



    /**
     * CREATE ANNOUNCES - Resources
     */
   // Create
   public function create(Request $request)
   {
      if($request->type == 'Space') {
        return redirect('create/spaces');
      }

      if($request->type == 'Service') {
        return redirect('create/services');
      }
   }

    // Create Spaces
    public function createSpaces()
    {
        return View('spaces.create');
    }

    // Create Services
    public function createServices()
    {
        return View('services.create');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
