<?php

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('groups')->group(function() {
    Route::get('/', 'GroupsController@index')->name('groups');
    Route::post('/', 'GroupsController@store')->name('groups.store');
    Route::get('/create', 'GroupsController@form')->name('groups.form');
    Route::get('/{group}', 'GroupsController@show')->name('groups.show');

    Route::get('/{group}/homework/', 'HomeworkController@form')->name('homework.form');
    Route::post('/{group}/homework/', 'HomeworkController@store')->name('homework.store');
    Route::get('/{group}/homework/{homework}', 'HomeworkController@show')->name('homework.show');
});



Route::get('/file/', 'FilesController@index')->name('files');
Route::post('/file/', 'FilesController@store')->name('files.store');
Route::get('/file/create', 'FilesController@create')->name('files.create');


