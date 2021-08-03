<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// the preferable routes as per requirements.
Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
Route::get('/uploadXml', 'AuthController@uploadXml');
Route::post('/delete', 'AuthController@destroy');
Route::get('/try', function (){
    return "hello";
});


Route::resource('year', 'YearController');
// this section is for when we use jwt checking in later purpose.
Route::group(['middleware' => 'api'], function () {
    Route::post('/logout', 'AuthController@logout');
    Route::get('/currentUsr', 'AuthController@getAuthUser');
    Route::post('/rateMe', 'AuthController@rateMe');
});
