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

    Route::prefix('/{group}')->group(function() {
        Route::get('/', 'GroupsController@show')->name('groups.show');
        Route::get('/invitation', 'GroupsController@invitation')->name('groups.invitation');
        Route::post('/join', 'GroupsController@join')->name('groups.join');

        Route::prefix('/homework')->group(function() {
            Route::get('/', 'HomeworkController@form')->name('homework.form');
            Route::post('/', 'HomeworkController@store')->name('homework.store');

            Route::put('/{homework}', 'HomeworkController@update')->name('homework.update');
            Route::get('/{homework}', 'HomeworkController@show')->name('homework.show');

            Route::get('/{homework}/file/', 'FilesController@form')->name('files.form');
            Route::post('/{homework}/file/', 'FilesController@store')->name('files.store');
            Route::get('/{homework}/file/{file}', 'FilesController@download')->name('files.download');
        });
    });
});


