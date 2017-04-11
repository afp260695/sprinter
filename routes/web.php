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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index');

Route::post('/login', 'Auth\LoginController@authenticate');
Route::get('/',  'Auth\LoginController@showLoginForm');
Route::get('/login',  'Auth\LoginController@showLoginForm');
Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'po'], function () {
    	Route::resource('/', 'PO\ProyekController', ['only' => ['index', 'show', 'store']]);
        Route::resource('/proyek', 'PO\ProyekController', ['only' => ['index', 'show', 'store']]);
        Route::resource('/user_story', 'PO\UserStoriesController', ['only' => ['index', 'show', 'store']]);	
    });

    Route::group(['prefix' => 'sm'], function () {
    	Route::get('/', function() {
    		echo "sm";
    		die();
    	}); 	
    });

    Route::group(['prefix' => 'dev'], function () {
    	Route::get('/', function() {
    		echo "dev";
    		die();
    	}); 	
    });
    
});