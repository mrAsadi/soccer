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

Route::middleware(['h2'])->group(function() {
    Route::get('/', 'TeamController@all');
});


Auth::routes();

Route::middleware(['auth'])->group(function() {
    Route::resource('players', 'PlayerController');
    Route::resource('teams', 'TeamController');
});
