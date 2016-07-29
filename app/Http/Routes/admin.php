<?php

Route::group(['namespace' => 'Admin'], function () {

    Route::get('/', ['as'=>'admin','uses' => 'UserController@index']);

    Route::get('clientes', [
        'uses' => 'ClientController@showClients',
        'as' => 'clients'
    ]);

    Route::post('payClient', [
        'uses' => 'UserController@payClient',
        'as' => 'payClient'
    ]);
    Route::post('UserSearch', [
        'uses' => 'UserController@searchClient',
        'as' => 'UserSearch'
    ]);
});

