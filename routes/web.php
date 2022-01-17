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

Route::get('/', function () {
    return redirect('student');
});   


Route::Resource('student','StudentController');


Route::get('search', 'AutoCompleteController@index');
Route::get('autocomplete', 'AutoCompleteController@search');


Route::post('searchAction', 'AutoCompleteController@searchAction')->name('searchAction');
