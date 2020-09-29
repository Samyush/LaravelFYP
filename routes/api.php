<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// estas rutas se pueden acceder sin proveer de un token válido.
Route::post('/login', 'AuthController@login'); 
Route::post('/register', 'AuthController@register');
// estas rutas requiren de un token válido para poder accederse. 
Route::group(['middleware' => 'auth.jwt'], function () { 
    Route::post('/logout', 'AuthController@logout');
});
