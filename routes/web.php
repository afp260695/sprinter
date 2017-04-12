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
        Route::resource('/developer', 'PO\DeveloperController', ['only' => ['show', 'store']]);	
    });

    Route::group(['prefix' => 'sm'], function () {
    	Route::resource('/', 'SM\SprintController', ['only' => ['index', 'store']]);
        Route::resource('/sprint', 'SM\SprintController', ['only' => ['index', 'store']]);
        Route::resource('/task', 'SM\TaskController', ['only' => ['show', 'store']]);
        Route::resource('/burndown_chart', 'SM\BurndownChartController', ['only' => ['show', 'store']]);
        
    });

    Route::group(['prefix' => 'dev'], function () {
    	Route::resource('/', 'DEV\ReportController', ['only' => ['index', 'store']]);
        Route::resource('/report', 'DEV\ReportController', ['only' => ['index', 'store']]);	
    });
    
});