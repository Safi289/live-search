<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/live_search', 'App\Http\Controllers\LivesearchController@index');
Route::get('/live_search/action', 'App\Http\Controllers\LivesearchController@action')->name('live_search.action');
