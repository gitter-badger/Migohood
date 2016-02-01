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
// Home...
Route::get('/', 'SiteController@home');

/*************************
  Routes for HelpCenter...
**************************/
// Help...
Route::get('help', 'SiteController@help');

// Terms & Conditions ...
Route::get('terms', 'SiteController@terms');

// Terms & Conditions ...
Route::get('terms_es', 'SiteController@terms_es');

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
Route::get('auth/facebook', 'Auth\AuthController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleFacebookCallback');

/************************************
  Routes for No Autenticated users...
************************************/
Route::get('explore', 'AppController@explore');             // Explore...

// Show Space...
/*
Route::get('space/{hash}', [
    'uses' => 'Posts\PostController@showSpace',
    'as' => 'space.show',
]);*/

/************************************
    Routes for Autenticated users...
************************************/
Route::group(['middleware' => 'auth'], function () {

  /**********************
      Routes for App...
  **********************/
    // Dashboard
    Route::get('dashboard', 'AppController@Dashboard');

    // Inbox
    Route::get('inbox', 'AppController@Inbox');                                // Inbox - Received
    Route::get('inbox/sent', 'AppController@InboxSent');                       // Inbox - Sent
    Route::get('inbox/archived', 'AppController@InboxArchived');               // Inbox - ArchivedAppController

    // My Spaces
    Route::get('myspaces', 'AppController@MySpaces');                          // My Spaces - All
    Route::get('myspaces/listed', 'AppController@MySpacesListed');             // My Spaces - Listed
    Route::get('myspaces/notlisted', 'AppController@MySpacesNotListed');       // My Spaces - Listed

    // My Offices
    Route::get('myoffices', 'AppController@MyOffices');                        // My Offices - All
    Route::get('myoffices/listed', 'AppController@MyOfficesListed');           // My Offices - Listed
    Route::get('myoffices/notlisted', 'AppController@MyOfficesNotListed');     // My Offices - Listed

    // My Services
    Route::get('myservices', 'AppController@MyServices');                      // My Services - All
    Route::get('myservices/listed', 'AppController@MyServicesListed');         // My Services - Listed
    Route::get('myservices/notlisted', 'AppController@MyServicesNotListed');   // My Services - Listed

    // Create
    Route::post('create', 'AppController@create');

    // Create Spaces
    Route::get('create/spaces', 'AppController@createSpaces');

    // Create Service
    Route::get('create/services', 'AppController@createServices');


  /**********************
    Routes for Spaces ...
  **********************/
    // Create Space
    Route::post('space/create', 'SpaceController@create');

    // Preview
    Route::get('space/{hash}/preview', [
        'uses' => 'SpaceController@preview',
        'as' => 'space.preview',
    ]);

    // Basics
    Route::get('space/{hash}/basics', [
        'uses' => 'SpaceController@basics',
        'as' => 'space.basics',
    ]);

    // Update avatar
    //Route::post('avatar/update', 'Users\UserController@avatarUpdate');

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
