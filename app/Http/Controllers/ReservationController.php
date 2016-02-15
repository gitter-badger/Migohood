<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reservation;
use App\Space;
use Auth;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{

  // Book
  public function book(Request $request, $hash, $type) {

    // Type Space
    if($type == 'space'){

      //Create a Hash
      $reservation_hash = str_random(40);
      $search = Reservation::where('hash', $reservation_hash)->first();

      //If Hash exists, Rehash
      if(!is_null($search)) {
        $reservation_hash = str_random(40);
      }

      //Search Space
      $space = Space::where('hash', $hash)->first();

      $reservation = new Reservation;
      $reservation->hash = $reservation_hash;
      $reservation->who_requests = Auth::user()->id;
      $reservation->who_rents = $space->user_id;
      $reservation->announce_hash = $space->hash;
      $reservation->announce_type = $type;
      $reservation->when_stars = Carbon::parse($request->stars)->format('Y-m-d');
      $reservation->when_ends = Carbon::parse($request->ends)->format('Y-m-d');
      $reservation->capacity = $request->capacity;
      $reservation->ammount = $space->price;
      $reservation->status = 'pending_approval';
      $reservation->save();

      return redirect()->route('space.show', ['hash' => $space->hash ]);
    }

    // Type Office

    // Type Service

  }

  public function answer($hash, $answer) {

      $reservation = Reservation::where('hash', $hash)->first();

      if($answer == 'yes') {
        $reservation->status = 'approved';
        $reservation->save();
        return redirect('/dashboard/reservations');
      }

      if($answer == 'no') {
        $reservation->status = 'declined';
        $reservation->save();
        return redirect('/dashboard/pending_approval');
      }




  }



}
