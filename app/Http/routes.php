<?php

use Maatwebsite\Excel\Facades\Excel;

Route::group(['middleware' => ['auth']], function () {
    require __DIR__ . '/Routes/front.php';
});

require __DIR__ . '/Routes/auth.php';

Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function () {
    require __DIR__ . '/Routes/admin.php';
});

Route::get('/', [
        'uses' => 'Auth\AuthController@getLogin',
        'as' => 'home'
    ]
);



Route::get('lang/{lang}', function ($lang) {
    session(['lang' => $lang]);
    return Redirect::back();
})->where([
    'lang' => 'en|es|pt'
]);