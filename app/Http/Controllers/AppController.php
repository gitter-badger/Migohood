<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
    //Dashboard
    public function Dashboard()
    {
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
      //MySpaces
      public function MySpaces()
      {
        //List of places
        //$user = Auth::user();
        //$spaces = Auth::user()->spaces;

        //return view('users/spaces.all', ['spaces' => $spaces]);
        return view('users/spaces.all');
      }

      //MySpaces - Listed
      public function MySpacesListed()
      {
        return view('users/spaces.listed');
      }

      //MySpaces - Not Listed
      public function MySpacesNotListed()
      {
        return view('users/spaces.notlisted');
      }

    /*******************
          My Offices
    *******************/
       //MyOffices
       public function MyOffices()
       {
         return view('users/offices.all');
       }

       //MyOffices - Listed
       public function MyOfficesListed()
       {
         return view('users/offices.listed');
       }

       //MySpaces - Not Listed
       public function MyOfficesNotListed()
       {
         return view('users/offices.notlisted');
       }

   /*******************
       My Services
   *******************/
      //MyServices
      public function MyServices()
      {
        return view('users/services.all');
      }

      //MyServices - Listed
      public function MyServicesListed()
      {
        return view('users/services.listed');
      }

      //MyServices - Not Listed
      public function MyServicesNotListed()
      {
        return view('users/services.notlisted');
      }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Explore
    public function explore()
    {
        //Get the authenticated user
        /*$user = Auth::user();*/

        return View('app.explore');
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
