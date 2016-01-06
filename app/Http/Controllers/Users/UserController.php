<?php

namespace App\Http\Controllers\Users;

use Auth;
use File;
use Validator;
//

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
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
    public function edit()
    {
      return view('users.edit');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function avatarUpdate(Request $request)
    {
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
        if($user->path == '/img/default.jpg') {
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

    }

    /*
      Todo
      Destroy profile pic!
      Edit user
    */


}
