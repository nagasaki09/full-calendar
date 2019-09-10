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


Route::get('/','CalendarController@index')
->middleware('auth');
Route::get('/calendar/ajax','AjaxController@getScheduleList');
Route::get('/calendar/ajax/addRecord','AddrecordController@recordInsert');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout'); 
Route::get('/calendar/ajax/updateRecord','UpdaterecordController@recordUpdate');
Route::get('/calendar/ajax/deleteRecord','deleteRecordController@recorddelete');