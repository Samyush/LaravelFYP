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

Route::get('/uploadFilePage', 'PagesController@index'); // localhost:8000/
Route::post('/uploadFile', 'PagesController@uploadFile');
Route::get('/uploadFail', 'PagesController@uploadFail');


//Route::get('/allData', 'PagesController@allData');
Route::post('/webLogin', 'AdminCRUDController@webLogin');


//CRUD operation for admin

Route::group(['middleware' => ['web']], function() {
    Route::resource('post','AdminCRUDController');
    Route::POST('addPost','AdminCRUDController@addPost');
    Route::POST('editPost','AdminCRUDController@editPost');
    Route::POST('deletePost','AdminCRUDController@deletePost');
});
