<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Site routes...
Route::get('/', 'Site\SiteController@home');  //Home

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
Route::get('password/success', ['middleware' => 'auth', function () {
    return view('auth.success');
}]);

// App routes...
Route::get('explore', 'App\AppController@explore');  //Explore

/*
* Routes for Autenticated users...
*/
Route::group(['middleware' => 'auth'], function () {
  /*
  * Routes for Settings...
  */
    // Profile Settings
    Route::get('settings/profile', 'Users\UserController@edit');

    // Update avatar...
    Route::post('avatar/update', 'Users\UserController@avatarUpdate');


});
