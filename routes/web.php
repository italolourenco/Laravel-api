<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(array('prefix' => 'api'), function()
{

  Route::get('/', function () {
      return response()->json(['message' => 'Jobs API', 'status' => 'Connected']);;
  });

  Route::resource('jobs', 'JobsController');
  Route::resource('companies', 'CompaniesController');
  Route::post('auth/login', 'AuthController@authenticate');
});

Route::get('/', function () {
    return redirect('api');
});
