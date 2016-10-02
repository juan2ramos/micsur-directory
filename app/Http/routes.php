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

Route::get('subir-excel', function () {
    Excel::load('exports/micsur.xlsx', function ($reader) {


        $results = $reader->get();

        foreach ($results as $result) {
            if (\Directory\User::where('email', $result->email )->exists()) {
                continue;
            }
            $sectorArray = [
                'Animación y videojuegos' => 5,
                'Audiovisual' => 1,
                'Diseño' => 2,
                'Editorial' => 4,
                'Música' => 3,
                'Artes escénicas' => 6
            ];
            $countryArray= [
                'Argentina' => 32,
                'Bolivia' => 68,
                'Brazil' => 76,
                'Canada' => 124,
                'Chile' => 152,
                'China' => 156,
                'Colombia' => 170,
                'Costa Rica' => 188,
                'Ecuador' => 218,
                'Finland' => 246,
                'France' => 250,
                'Germany' => 276,
                'Israel' => 376,
                'Italy' => 380,
                'Mexico' => 484,
                'Panama' => 591,
                'Paraguay' => 600,
                'Peru' => 604,
                'Poland' => 258,
                'South Africa' => 710,
                'Spain' => 724,
                'Sweden' => 752,
                'United Kingdom' => 826,
                'United States' => 840,
                'Uruguay' => 858,
                'Venezuela' => 862,
            ];

            $user = \Directory\User::create([
                'name' => $result->name,
                'last-name' => (empty($result->last_name)?'_':$result->last_name),
                'identification-number' => (empty($result->identification_number))?'000':$result->identification_number,
                'image-profile' => $result->image_profile,
                'email' => $result->email,
                'password' => $result->password,
                'password_2' => $result->password,
                'role_id' => $result->role_id,
            ]);
            $user->client()->create([
                'company' => $result->company,
                'country' => $countryArray[$result->country],
                'address' => (empty($result->address))?'_':$result->address,
                'mobile' => $result->mobile,
                'phone' => $result->phone,
                'validate' => 1,
                'activities' =>(empty($result->activities))?'_':$result->activities ,
                'website' => (empty($result->website))?'_':$result->website,
            ])->sectors()->attach($sectorArray[$result->sector]);


        }
        dd('ok');
    });

});

Route::get('lang/{lang}', function ($lang) {
    session(['lang' => $lang]);
    return Redirect::back();
})->where([
    'lang' => 'en|es|pt'
]);