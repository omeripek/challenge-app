<?php

Route::group(['middleware' => 'web', 'prefix' => 'challenge', 'namespace' => 'Modules\Challenge\Http\Controllers'], function()
{
    Route::get('/', 'ChallengeController@index');
    Route::get('/game/{id}', 'ChallengeController@show')->name('challenge.game');
    Route::get('/details', 'ChallengeController@showDetails')->name('challenge.details');
    Route::get('/list', 'ChallengeController@list')->name('challenge.list');
    Route::get('/statistics', 'ChallengeController@statistics')->name('challenge.statistics');
    Route::post('/result/{id?}/{userXId?}/{userYId?}', 'ChallengeController@challengeResult')->name('challenge.result');

    Route::post('/list/create/{id?}', 'ChallengeController@addChallenge')->name('challenge.addChallenge');
    Route::get('/list/accept/{id}', 'ChallengeController@accept')->name('challenge.accept');
    Route::get('/list/reject/{id}', 'ChallengeController@reject')->name('challenge.reject');
    Route::get('/list/play/{id}/{userXId}/{userYId}', 'ChallengeController@play')->name('challenge.play');
});
