<?php

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/groups', 'GroupsController@index')->name('groups');
Route::post('/groups', 'GroupsController@store')->name('groups.store');


Route::get('/groups/create', 'GroupsController@create')->name('groups.create');
Route::get('/groups/form', 'GroupsController@form')->name('form');

Route::get('/groups/{id}', 'GroupsController@show')->name('groups.show');

Route::get('/file/', 'FilesController@store')->name('files.store');
Route::post('/file/', 'FilesController@store')->name('files.store');
Route::get('/file/create', 'FilesController@create')->name('files.create');
