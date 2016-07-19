<?php

Route::group(['middleware' => ['auth']], function () {
    require __DIR__ . '/Routes/front.php';
});

require __DIR__ . '/Routes/auth.php';

Route::group(['middleware' => ['admin']], function () {
    require __DIR__ . '/Routes/admin.php';
});
Route::get('/', function () {
    return view('front.register');
});
