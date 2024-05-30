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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





// DSR Route Here----------------
Route::prefix('DSR')->group(function () {
    Route::get('/backend/add', 'Backend\DSR\DSRController@index')->name('dsr.add');
    Route::post('/backend/store', 'Backend\DSR\DSRController@store')->name('dsr.store');

    //Ajax Route Here............

    Route::get('/backend/varifyemail','Backend\DSR\DSRController@varifyemail');
    Route::get('/backend/varify/name','Backend\DSR\DSRController@varifyuserName');
});