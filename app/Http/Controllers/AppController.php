<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;

use App\Space;
use App\Office;
use App\Service;
use App\Reservation;

use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AppController extends Controller
{

    /*******************
          Spaces
    *******************/
    // Spaces
    public function spaces() {
      $spaces = DB::table('spaces')
                  ->where('public','yes')
                  ->orderBy('created_at', 'desc')
                  ->paginate(10);


      return view('app.spaces', ['spaces' => $spaces]);
    }

    // Offices
    public function offices() {
      $offices = DB::table('offices')
                  ->where('public','yes')
                  ->orderBy('created_at', 'desc')
                  ->paginate(10);


      return view('app.offices', ['offices' => $offices]);
    }

    // Services
    public function services() {
      $services = DB::table('services')
                  ->where('public','yes')
                  ->orderBy('created_at', 'desc')
                  ->paginate(10);


      return view('app.services', ['services' => $services]);
    }


    /*******************
         Dashboard
    *******************/
    // Dashboard
    public function Dashboard() {
      return view('users/dashboard.dashboard');
    }

    // Reservations
    public function Reservations() {
      $reservations = DB::table('reservations')
                ->where('who_rents', Auth::user()->id)
                ->where('status','approved')->paginate(20);

      return view('users/dashboard.reservations', ['reservations' => $reservations]);
    }

    // MyRents
    public function MyRents() {
      $reservations = DB::table('reservations')
                ->where('who_requests', Auth::user()->id)
                ->where('status','approved')->paginate(20);

      return view('users/dashboard.my_rents', ['reservations' => $reservations]);
    }

    // PendingApproval
    public function PendingApproval() {
        $reservations = DB::table('reservations')
                  ->where('who_rents', Auth::user()->id)
                  ->where('status','pending_approval')->paginate(20);

      return view('users/dashboard.pending_approval', ['reservations' => $reservations]);

    }

    // PendingPayment
    public function PendingPayment() {
      return view('users/dashboard.pending_payment');
    }

    // Transactions
    public function Transactions() {
      return view('users/dashboard.transactions');
    }


    /*******************
           Inbox
    *******************/
     // Inbox
     public function Inbox()
     {
       return view('users/inbox.received');
     }

     // Inbox - Sent
     public function InboxSent()
     {
       return view('users/inbox.sent');
     }

     // Inbox - Trash
     public function InboxArchived()
     {
       return view('users/inbox.archived');
     }


    /*******************
          My Spaces
    *******************/
    // MySpaces - Listed
    public function MySpacesListed()
    {
      $spaces = DB::table('spaces')
                  ->where('user_id', Auth::user()->id)
                  ->where('public', 'yes')->get();
      return view('users/spaces.listed', ['spaces' => $spaces]);
    }

    // MySpaces - Not Listed
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
     // MyOffices - Listed
     public function MyOfficesListed()
     {
       $offices = DB::table('offices')
                   ->where('user_id', Auth::user()->id)
                   ->where('public', 'yes')->get();
       return view('users/offices.listed', ['offices' => $offices]);
     }

     // MySpaces - Not Listed
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
      // MyServices - Listed
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



      /*******************
        Create Announces
      *******************/
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


      /*******************
            Searches
      *******************/
      // Spaces Search
      public function SpaceSearch(Request $request)
      {

        // If Query Text Empty redirect
        if(!$request->query_text){
          return redirect('/spaces');
        }

        // If at least one option is empty
        if(!$request->type or !$request->accomodance or !$request->capacity) {

          // Text in the input
          $query_text = $request->query_text;

          /****
            Spaces where :
              Public == 'yes' AND (city LIKE 'query_text' OR country LIKE 'query_text')
          ***/
          $spaces = DB::table('spaces')
                        ->where('public', 'yes')
                        ->where(function($query) use ($query_text) {
                            $query->where('city', 'LIKE', '%'. $query_text .'%')
                                  ->orWhere('country', 'LIKE', '%'. $query_text .'%');
                        })
                        ->paginate(10);

          return view('app.spaces', ['spaces' => $spaces]);
        }

        //Otherwhise, just search

        // Inputs
        $query_text = $request->query_text;
        $type = $request->type;
        $accomodance = $request->accomodance;
        $capacity = $request->capacity;

        /****
          Spaces where :
            Public == 'yes' AND (city LIKE 'query_text' OR country LIKE 'query_text') AND
            (type == $request->type AND accomodance == $request->accomodance AND capacity == $request->capacity)
        ***/
        $spaces = DB::table('spaces')
                      ->where('public', 'yes')
                      ->where(function($query) use ($query_text) {
                          $query->where('city', 'LIKE', '%'. $query_text .'%')
                                ->orWhere('country', 'LIKE', '%'. $query_text .'%');
                      })
                      ->where(function($query) use ($type, $accomodance, $capacity) {
                          $query->where('type', $type)
                                ->where('accomodance', $accomodance)
                                ->where('capacity', $capacity);
                      })
                      ->paginate(10);

        return view('app.spaces', ['spaces' => $spaces]);

      }

      // Offies Search
      public function OfficeSearch(Request $request)
      {

        // If Query Text Empty redirect
        if(!$request->query_text){
          return redirect('/offices');
        }

        // If at least one option is empty
        if(!$request->type or !$request->accomodance or !$request->capacity) {

          // Text in the input
          $query_text = $request->query_text;

          /****
            Offices where :
              Public == 'yes' AND (city LIKE 'query_text' OR country LIKE 'query_text')
          ***/
          $offices = DB::table('offices')
                        ->where('public', 'yes')
                        ->where(function($query) use ($query_text) {
                            $query->where('city', 'LIKE', '%'. $query_text .'%')
                                  ->orWhere('country', 'LIKE', '%'. $query_text .'%');
                        })
                        ->paginate(10);

          return view('app.offices', ['offices' => $offices]);
        }

        //Otherwhise, just search

        // Inputs
        $query_text = $request->query_text;
        $type = $request->type;
        $accomodance = $request->accomodance;
        $capacity = $request->capacity;

        /****
          Offices where :
            Public == 'yes' AND (city LIKE 'query_text' OR country LIKE 'query_text') AND
            (type == $request->type AND accomodance == $request->accomodance AND capacity == $request->capacity)
        ***/
        $offices = DB::table('offices')
                      ->where('public', 'yes')
                      ->where(function($query) use ($query_text) {
                          $query->where('city', 'LIKE', '%'. $query_text .'%')
                                ->orWhere('country', 'LIKE', '%'. $query_text .'%');
                      })
                      ->where(function($query) use ($type, $accomodance, $capacity) {
                          $query->where('type', $type)
                                ->where('accomodance', $accomodance)
                                ->where('capacity', $capacity);
                      })
                      ->paginate(10);

        return view('app.offices', ['offices' => $offices]);

      }

      // Service Search
      public function ServiceSearch(Request $request)
      {

        // If Query Text Empty redirect
        if(!$request->query_text){
          return redirect('/services');
        }

        // If at least one option is empty
        if(!$request->type or !$request->capacity) {

          // Text in the input
          $query_text = $request->query_text;

          /****
            Services where :
              Public == 'yes' AND (city LIKE 'query_text' OR country LIKE 'query_text')
          ***/
          $services = DB::table('services')
                        ->where('public', 'yes')
                        ->where(function($query) use ($query_text) {
                            $query->where('city', 'LIKE', '%'. $query_text .'%')
                                  ->orWhere('country', 'LIKE', '%'. $query_text .'%');
                        })
                        ->paginate(10);

          return view('app.services', ['services' => $services]);
        }

        //Otherwhise, just search

        // Inputs
        $query_text = $request->query_text;
        $type = $request->type;
        $capacity = $request->capacity;

        /****
          Services where :
            Public == 'yes' AND (city LIKE 'query_text' OR country LIKE 'query_text') AND
            (type == $request->type AND accomodance == $request->accomodance AND capacity == $request->capacity)
        ***/
        $services = DB::table('services')
                      ->where('public', 'yes')
                      ->where(function($query) use ($query_text) {
                          $query->where('city', 'LIKE', '%'. $query_text .'%')
                                ->orWhere('country', 'LIKE', '%'. $query_text .'%');
                      })
                      ->where(function($query) use ($type, $capacity) {
                          $query->where('type', $type)
                                ->where('capacity', $capacity);
                      })
                      ->paginate(10);

        return view('app.services', ['services' => $services]);

      }


}
