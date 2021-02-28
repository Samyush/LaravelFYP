<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// estas rutas se pueden acceder sin proveer de un token válido.
Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
// estas rutas requiren de un token válido para poder accederse.
Route::group(['middleware' => 'api'], function () {
    Route::post('/logout', 'AuthController@logout');
    Route::get('/currentUsr', 'AuthController@getAuthUser');
    Route::post('/rateMe', 'AuthController@rateMe');
});
