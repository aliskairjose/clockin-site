<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

Route::view('/', 'welcome');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
