<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'Api\AuthController@login')->name('login');
Route::post('register', 'Api\RegisterController@register')->name('register');
Route::post('password/email', 'Api\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::post('password/reset', 'Api\ResetPasswordController@reset')->name('password.reset');


// Route::group(['middleware' => ['jwt.verify']], function() {
    /*AÑADE AQUI LAS RUTAS QUE QUIERAS PROTEGER CON JWT*/

    // Users Routes
    Route::get('users', 'Api\UserController@index');

    // Company Route
    Route::get('companies', 'Api\CompanyController@index');
    Route::get('companies/{id}', 'Api\CompanyController@show');
    Route::post('companies','Api\CompanyController@store');
    Route::put('companies/{id}','Api\CompanyController@update');
    Route::delete('companies/{id}', 'Api\CompanyController@destroy');

    // WorkShift Routes
    Route::get('workshifts', 'Api\WorkshiftController@index');
    Route::get('workshifts/{id}', 'Api\WorkshiftController@show');
    Route::post('workshifts','Api\WorkshiftController@store');
    Route::put('workshifts/{id}','Api\WorkshiftController@update');
    Route::delete('workshifts/{id}', 'Api\WorkshiftController@destroy');

// });
