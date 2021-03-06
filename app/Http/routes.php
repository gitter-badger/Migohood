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
Route::get('redirect', 'AppController@getRedirect');

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
  Routes for No Authenticated users
************************************/
Route::get('app/get/{resource}', [
    'uses' => 'AppController@getResource',
    'as' => 'get.resource',
]);


/************************************
  Routes for Authenticated users
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
  Route::get('app/create', 'AppController@getcreate');

  // Post Create Resources
  Route::post('app/create/{resource}', [
      'uses' => 'AppController@postcreate',
      'as' => 'create',
  ]);

  // Resource Show - Get
  /*
  Route::get('app/show/{resource}/{hash}', [
      'uses' => 'AppController@resourceShow',
      'as' => 'resource.show',
  ]);*/

  // Resource Router - Get
  Route::get('app/{resource}/{hash}/{route}', [
      'uses' => 'AppController@resourceRouter',
      'as' => 'resource.router',
  ]);

  // Resource Router - Update
  Route::post('app/{resource}/{hash}/{route}/{next}/update', [
      'uses' => 'AppController@resourceRouterUpdate',
      'as' => 'resource.router.update',
  ]);

  // Resource Thumbnail - Update
  Route::post('app/thumbnail/upload/{resource}/{hash}', [
      'uses' => 'AppController@resourceThumbnailUpload',
      'as' => 'resource.thumbnail.upload',
  ]);

  // Resource Gallery - Update
  Route::post('app/gallery/upload/{resource}/{hash}', [
      'uses' => 'AppController@resourceGalleryUpload',
      'as' => 'resource.gallery.upload',
  ]);

  // Get Routes
  Route::get('app/{base}/{route}', [
      'uses' => 'AppController@getRoute',
      'as' => 'route',
  ]);

});

/******************************
        Routes for Maps
******************************/
// Get City Json
Route::get('request/json/city/{id}', 'MapController@getIndividualCity');
/* !! */
Route::get('help', 'MapController@help');


/******************************
  Routes for Extra Functions
******************************/
// Get Img from storage
Route::get('uploads/{folder}/{resource}/{filename}', [
    'uses' => 'AppController@getImgFromStorage',
    'as' => 'get.imgFromStorage',
]);

// Delete Img from storage
Route::get('imgs/{folder}/{resource}/{filename}/delete', [
    'uses' => 'AppController@deleteImgFromStorage',
    'as' => 'delete.imgFromStorage',
]);
