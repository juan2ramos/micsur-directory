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
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]
);

Route::get('pass', function () {
    $users = \Illuminate\Foundation\Auth\User::where('id', '>', '932')->get();

    foreach ($users as $user) {
        print_r($user->password);
        $user->password = bcrypt($user->password);
        $user->save();
    }

    dd('ok');
});

Route::get('lang/{lang}', function ($lang) {
    session(['lang' => $lang]);
    return Redirect::back();
})->where([
    'lang' => 'en|es|pt'
]);