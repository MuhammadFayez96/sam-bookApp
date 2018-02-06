<?php

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('Welcome');
});
/*
       .......... Basic Controller .............

Route::get('library','sectionController@index');
Route::get('library/create','sectionController@createNewSection');
Route::post('library/create','sectionController@saveNewSection');
Route::get('library/{sectionName}','sectionController@showSection');
Route::get('library/{sectionName}/edit','sectionController@editSection');
Route::patch('library/{sectionName}/edit','sectionController@saveEditedSection');
Route::delete('library/{sectionName}/delete','sectionController@deleteSection');
*/

/*
               ................. RESTful controller..........

Route::Controller('library','sectionController');

*/

Route::resource('library','sectionController2');
Route::resource('books','booksController');
Route::get('admin','sectionController2@admin');
Route::post('admin/update/sections/{id}','sectionController2@update');
Route::post('admin/delete/sections/{id}','sectionController2@destroy');
Route::post('admin/restore/{id}','sectionController2@restore');
Route::post('admin/delete-forever/{id}','sectionController2@deleteForever');
Route::get('admin/{id}','sectionController2@show');
Route::post('books/update/{id}','booksController@update');
Route::post('books/delete/{id}','booksController@destroy');
Route::get('summary','booksController@summary');








