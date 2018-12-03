<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

SIGNUP API: POST: http://localhost/theapi/public/api/a2b
PROFILE API:GET: http://localhost/theapi/public/api/a2b/{$id}
|http://localhost/theapi/public/login
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('api/', "ApiController");

// Route::resource('my', 'MyController');
Route::resource('api/a2b', 'MyController');
// //  Route::post('/login', array('drivers' => 'ApisController@doLogin'));
// Auth::routes();
 Route::post('/login', "MyController@doLogin");
