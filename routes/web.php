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
Route::get('admin','sectionController2@admin');
Route::post('admin/update/sections/{id}','sectionController2@updateSection');
Route::post('admin/delete/sections/{id}','sectionController2@destroySction');








