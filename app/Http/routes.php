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
// Home...
Route::get('/', 'SiteController@home');


/******************************
    Routes for HelpCenter
******************************/
// Help...
Route::get('help', 'SiteController@help');

// Terms & Conditions ...
Route::get('help/terms', 'SiteController@terms');

// Terms & Conditions ...
Route::get('help/terms_es', 'SiteController@terms_es');


/******************************
    Routes for Authentication
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

// Goole Routes ...
Route::get('auth/google', 'Auth\AuthController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\AuthController@handleGoogleCallback');


/************************************
   Routes for No Autenticated users
************************************/
Route::get('spaces', 'AppController@spaces');             // Spaces...
Route::get('services', 'AppController@services');         // Services...


/************************************
     Routes for Autenticated users
************************************/
Route::group(['middleware' => 'auth'], function () {

  /******************************
          Routes for App
  ******************************/
    // Dashboard
    Route::get('dashboard', 'AppController@Dashboard');

    // Inbox
    Route::get('inbox', 'AppController@Inbox');                                // Inbox - Received
    Route::get('inbox/sent', 'AppController@InboxSent');                       // Inbox - Sent
    Route::get('inbox/archived', 'AppController@InboxArchived');               // Inbox - ArchivedAppController

    // My Spaces
    Route::get('myspaces', 'AppController@MySpacesListed');                    // My Spaces - Listed
    Route::get('myspaces/notlisted', 'AppController@MySpacesNotListed');       // My Spaces - Not Listed

    // My Offices
    Route::get('myoffices', 'AppController@MyOfficesListed');                  // My Offices - Listed
    Route::get('myoffices/notlisted', 'AppController@MyOfficesNotListed');     // My Offices - Not Listed

    // My Services
    Route::get('myservices', 'AppController@MyServicesListed');                // My Services - Listed
    Route::get('myservices/notlisted', 'AppController@MyServicesNotListed');   // My Services - Not Listed

    // Redirect to Create Spaces or Services (Modal)
    Route::post('create', 'AppController@create');

    // Show view for Create Spaces
    Route::get('create/spaces', 'AppController@createSpaces');

    // Show view for Create Services
    Route::get('create/services', 'AppController@createServices');


    /******************************
          Routes for Spaces
    ******************************/
    // Show Space
    Route::get('space/{hash}', [
        'uses' => 'SpaceController@show',
        'as' => 'space.show',
    ]);

    // Create Space
    Route::post('space/create', 'SpaceController@create');

    // Space Router - Get
    Route::get('space/{hash}/{route}', [
        'uses' => 'SpaceController@router',
        'as' => 'space.router',
    ]);

    // Space Router Update - Post
    Route::post('space/{hash}/{route}/update', [
        'uses' => 'SpaceController@update',
        'as' => 'space.router.update',
    ]);


    /******************************
          Routes for Offices
    ******************************/
    // Show Office
    Route::get('office/{hash}', [
        'uses' => 'OfficeController@show',
        'as' => 'office.show',
    ]);

    // Create office
    Route::post('office/create', 'OfficeController@create');

    // Office Router - Get
    Route::get('office/{hash}/{route}', [
        'uses' => 'OfficeController@router',
        'as' => 'office.router',
    ]);

    // Office Router Update - Post
    Route::post('office/{hash}/{route}/update', [
        'uses' => 'OfficeController@update',
        'as' => 'office.router.update',
    ]);

    /******************************
          Routes for Services
    ******************************/
    // Show Service
    Route::get('service/{hash}', [
        'uses' => 'ServiceController@show',
        'as' => 'service.show',    
    ]);

    // Create service
    Route::post('service/create', 'ServiceController@create');

    // Office Router - Get
    Route::get('service/{hash}/{route}', [
        'uses' => 'ServiceController@router',
        'as' => 'service.router',
    ]);

    // Office Router Update - Post
    Route::post('service/{hash}/{route}/update', [
        'uses' => 'ServiceController@update',
        'as' => 'service.router.update',
    ]);

});
