<?php

Route::get('finalizar-pago', [
    'uses' => 'PayController@index',
    'as' => 'payClient'
])->middleware('finish');

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
])->middleware('directory');

Route::post('directorio', [
    'uses' => 'DirectoryController@filterUser',
    'as' => 'directoryPost'
])->middleware('directory');;

Route::get('usuario/{id}', [
    'uses' => 'DirectoryController@user',
    'as' => 'directoryUser'
])->middleware('directory');

Route::post('sendMail',[
    'uses' => 'SendMessageController@messageDirectory',
    'as' => 'sendMail'
]);