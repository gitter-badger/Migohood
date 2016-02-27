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
/******************************
      Routes for MainSite
******************************/
Route::get('/', 'SiteController@home');                     // Home...

/******************************
    Routes for Authentication
******************************/
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('redirect', 'AppController@getredirect');

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

// Redirect To Provider...
Route::get('auth/{provider}', [
    'uses' => 'Auth\AuthController@redirectToProvider',
    'as' => 'social.auth',
]);

// Provider Callback...
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

/************************************
   Routes for No Autenticated users
************************************/
// Get Routes (Spaces, Workspaces, Parking Lots, Services)
Route::get('{route}', [
    'uses' => 'AppController@getroute',
    'as' => 'router',
]);

/************************************
     Routes for Autenticated users
************************************/
Route::group(['middleware' => 'auth'], function () {

  /******************************
          Routes for Admin
  ******************************/
  Route::get('admin/panel', 'AdminController@panel');


  /******************************
          Routes for App
  ******************************/
  // Get Create Resources
  Route::get('create', 'AppController@getcreate');

  // Post Create Resources
  Route::post('create/{resource}', [
      'uses' => 'AppController@postcreate',
      'as' => 'create',
  ]);


});
