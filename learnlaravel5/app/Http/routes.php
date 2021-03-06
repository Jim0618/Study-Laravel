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
Route::get('/', function (){
    return view('welcome');
});

Route::get('now', function (){
    return date("Y-m-d H:i:s");
});

Route::get('auth/logout',function(){
    Auth::logout();
});

Route::auth();

Route::get('/home', 'HomeController@index');
