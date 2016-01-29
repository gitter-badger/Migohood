<?php

namespace App\Http\Controllers\Users;

use Auth;
//use File;
use App\Place;
use Validator;
//

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //Dashboard
    public function Dashboard()
    {
       return view('users.dashboard');
    }

    //Inbox
    public function Inbox()
    {
        return view('users.inbox');
    }

    //MySpaces
    public function MySpaces()
    {
      //List of places
      //$user = Auth::user();
      $places = Auth::user()->places;

      return view('users.spaces', ['places' => $places]);
    }

    //MyServices
    public function MyServices()
    {
        return view('users.services');
    }

    /*******************
          Users ...
    *******************/
    public function edit()
    {
      return view('users.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    //AvatarUpdate
    public function avatarUpdate(Request $request)
    {
        /*
      //Validate the Request
      $validator = Validator::make($request->all(), [
        'image' => 'required|image',
      ],
      [
        'image.required' => 'File is required',
        'image.image' => 'File format not allowed',
        //'image.size' => 'Max File size allowed is 1MB ',
      ]);

      //Did it Fail?
      if ($validator->fails()) {
        return redirect('settings/profile')->with('update_status', 'fail');
      }

      //No, It didn't
        //So, get the user
        $user = Auth::user();

        // Set new Filename
        $name = 'user_'.$user->id.'.'.$request->file('image')->getClientOriginalExtension();

        //User path is default?
        if($user->path == '/img/app/default.jpg') {
          //Move file to avatars folder
          $request->file('image')->move('avatars', $name);
          //Save new path
          $user->update(['path'=>'avatars/'.$name]);

        }
        else {
          //Destroy last path
          File::delete($user->path);
          //Move file to avatars folder
          $request->file('image')->move('avatars', $name);
          //Save new path
          $user->update(['path'=>'avatars/'.$name]);
        }

        return redirect('settings/profile')->with('update_status', 'done');
        */
    }

    /*
      Todo
      Destroy profile pic!
      Edit user
    */


}
