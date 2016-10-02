<?php

Route::get('finalizar-pago', [
    'uses' => 'PayController@index',
    'as' => 'payClient'
]);

Route::get('mi-perfil', [
    'uses' => 'UserController@index',
    'as' => 'profile'
]);
Route::post('mi-perfil', [
    'uses' => 'UserController@update',
    'as' => 'profilePost'
]);

Route::get('directorio', [
    'uses' => 'DirectoryController@index',
    'as' => 'directory'
]);
Route::post('directorio', [
    'uses' => 'DirectoryController@filterUser',
    'as' => 'directoryPost'
]);

Route::get('usuario/{id}', [
    'uses' => 'DirectoryController@user',
    'as' => 'directoryUser'
]);