<?php

Route::group(['middleware' => 'web', 'prefix' => 'admincp', 'namespace' => 'Modules\AdminCP\Http\Controllers'], function()
{
    Route::get('/', 'AdminCPController@index');
    Route::get('/add-question/', 'AdminCPController@addForm')->name('add-question.addForm');
    Route::get('/add-question/edit/{id}', 'AdminCPController@addForm')->name('add-question.edit');
    Route::post('/add-question/create/{id?}', 'AdminCPController@create')->name('add-question.create');
    Route::get('/add-question/delete/{id}', 'AdminCPController@delete')->name('add-question.delete');

    Route::get('/user-list', 'AdminCPController@show')->name('user-list');
    Route::get('/user-list/delete/{id}', 'AdminCPController@destroy')->name('user-list.destroy');
    Route::get('/user-list/update/{id}', 'AdminCPController@update')->name('user-list.update');
    Route::get('/user-list/details/{id}', 'AdminCPController@details')->name('user-list.details');
});
