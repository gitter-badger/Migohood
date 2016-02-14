<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use DB;
use File;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /*******************
           Users
    *******************/
    // Account
    public function account()
    {
      $user = Auth::user();
      $countries =  DB::table('countries')->get();

      return view('users/settings.account', ['user' => $user, 'countries' => $countries ]);
    }

    // Privacy
    public function privacy()
    {
      $user = Auth::user();

      return view('users/settings.privacy', ['user' => $user ]);
    }

    // Payment
    public function payment()
    {
      $user = Auth::user();

      return view('users/settings.payment', ['user' => $user ]);
    }

    // Update Account
    public function updateAccount(Request $request, $id)
    {

      $user = Auth::user();

      $user->name = $request->name;
      $user->lastname = $request->lastname;
      $user->email = $request->email;
      $user->cellphone = $request->cellphone;
      $user->homephone = $request->homephone;
      $user->country = $request->country;
      $user->city = $request->city;
      $user->address = $request->address;
      $user->location_references = $request->location_references;
      $user->zip = $request->zip;

      $user->save();

      return redirect('/settings/account');
    }

    // Update Avatar
    public function updateAvatar(Request $request)
    {
        $user = Auth::user();

        $file = $request->file('file');

        // If there is a file in the request, proceed
        if(!empty($file)) {

          // If avatar is default, do not delete, otherwise, overwrite
          if($user->avatar != '/img/app/default.jpg') {
            File::delete($user->avatar);
          }

          // Filename
          $filename = 'user_'.$user->id.'.'.$request->file('file')->getClientOriginalExtension();

          // Store in 'thumbnails' folder
          $request->file('file')->move('avatars', $filename);

          // Link recently updated with avatar, which is the owner
          $user->avatar = '/avatars'.'/'.$filename;

            // Save new path
            $user->save();
          }

          return redirect('/settings/account');
    }

    /*
      Todo
      Destroy profile pic!
    */

}
