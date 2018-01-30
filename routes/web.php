<?php

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/groupes', 'GroupsController@index')->name('groups');
Route::post('/groupes', 'GroupsController@store')->name('groups.store');
Route::get('/groupes/create', 'GroupsController@create')->name('groups.create');