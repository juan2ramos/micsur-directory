<?php

Route::group(['namespace' => 'admin'], function () {

    Route::get('/',  function(){});

    Route::get('clientes', [
        'uses' => 'ClientController@showClients',
        'as' => 'clients'
    ]);
});

