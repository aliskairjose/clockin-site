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

    Route::get('users', 'Api\UserController@index');
// });
