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
/*********************
  Routes for Site...
**********************/
Route::get('/', 'Site\SiteController@home');        // Home...
Route::get('help', 'Site\SiteController@help');     // Help...
Route::get('terms', 'Site\SiteController@terms');   // Terms & Conditions ...
Route::get('terms_es', 'Site\SiteController@terms_es');   // Terms & Conditions ...

/******************************
  Routes for Authentication...
******************************/
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



// Facebook Routes ...
Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');

/************************************
  Routes for No Autenticated users...
************************************/
Route::get('explore', 'App\AppController@explore');             // Explore...

// Show Space...
Route::get('space/{hash}', [
    'uses' => 'Posts\PostController@showSpace',
    'as' => 'space.show',
]);

/************************************
    Routes for Autenticated users...
************************************/
Route::group(['middleware' => 'auth'], function () {

   Route::get('test', 'Users\UserController@test');
  /**********************
      Routes for App...
  **********************/
    // Dashboard
    Route::get('dashboard', 'Users\UserController@Dashboard');

    // Inbox
    Route::get('inbox', 'Users\UserController@Inbox');

    // User Spaces
    Route::get('myspaces', 'Users\UserController@MySpaces');

    // Services
    Route::get('myservices', 'Users\UserController@MyServices');

  /**************************
      Routes for Settings...
  **************************/
    // Profile
    Route::get('settings/profile', 'Users\UserController@edit');

    // Update avatar
    //Route::post('avatar/update', 'Users\UserController@avatarUpdate');

  /**********************
    Routes for Posts...
  **********************/
    // Create
    Route::get('create', 'Posts\PostController@create');

    /**
    * Post Space
    */
    // Step 1
    Route::post('space', 'Posts\PostController@Space');

    // Step 2
    Route::post('space/basic', 'Posts\PostController@SpaceBasic');

    // Post Service
    //Route::post('service', 'Posts\PostController@ServiceStore');

});


//Debuggin
Route::get('myip', function () {
  //$ip = $_SERVER['REMOTE_ADDR'];
  //$ip = Request::ip();
  $ip = '181.137.219.4'; //Debuggin purposes
  $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

  return $details->city; // -> "Mountain View"

  /*
  "ip": "8.8.8.8",
  "hostname": "google-public-dns-a.google.com",
  "loc": "37.385999999999996,-122.0838",
  "org": "AS15169 Google Inc.",
  "city": "Mountain View",
  "region": "CA",
  "country": "US",
  "phone": 650
  */
});
