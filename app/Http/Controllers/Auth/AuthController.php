<?php

namespace Directory\Http\Controllers\Auth;

use Directory\Entities\Client;
use Illuminate\Http\Request;
use Directory\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Directory\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'last-name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'identification-number' => 'required|max:255',
            'image-profile' => 'mimes:jpeg,jpg,png,gif|required|max:20000',

            'company' => 'required|max:255',
            'country' => 'required|max:255',
            'activities' => 'required|max:255',
            'address' => 'required|max:255',
            'mobile' => 'required|max:255',
            'mobile-1' => 'required|max:255',
            'sector' => 'required|max:255',
        ],
            [
                'name.required' => 'El nombre es obligatorio',
                'last-name.required' => 'El Apellido es obligatorio',
                'identification-number.required' => 'El número de identificación es obligatorio',
                'email.required' => 'El Email es obligatorio',
                'email.unique' => 'Este mail ya esta registrado',
                'password.required' => 'La contraseña es obligatoria',
                'password.confirmed' => 'Las contraseñas deben coincidir',
                'password.min' => 'La contraseña debe contener mas de 6 caráteres',
                'image-profile.mimes' => 'El archivo debe ser una imagen',
                'image-profile.required' => 'La imagen es obligatoria',
                'image-profile.max' => 'La imagen no debe ser mayor a 2M',

                'sector.required' => 'El campo sector es obligatorio',
                'country.required' => 'El campo país es obligatorio',
                'address.required' => 'El Dirección es obligatorio',
                'company.required' => 'La empresa es obligatorio',
                'activities.required' => 'La actividad es obligatorio',
                'what-i-do.required' => 'A que me dedico:    es obligatorio',
                'mobile.required' => 'El Teléfono móvil: es obligatorio',
                'mobile-1.required' => 'El Teléfono móvil: es obligatorio',
            ]

        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'last-name' => $data['last-name'],
            'identification-number' => $data['identification-number'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'password_2' => md5($data['password']),
            'role_id' => 2,
        ]);
    }

    public function loginPath()
    {
        return route('login');
    }

    public function postRegister(Request $request)
    {

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $user = $this->create($request->all());


        if ($user->role_id == 2)
           $this->createClient($request,$user);


        Mail::send('emails.welcome', ['user' => $user], function ($m) use ($user) {
            $m->from('coordinaciondirectorio@micsur.org ', 'Directorio Micsur');
            $m->bcc('coordinaciondirectorio@micsur.org ');
            $m->to($user->email, $user->name)->subject('Bienvenido!');

        });

        Auth::loginUsingId($user->id);
        return redirect($this->redirectPath());
    }
    private function createClient($request,$user){

        $data = $request->all();
        if ($request->hasFile('image-profile')) {
            $imageName = str_random(40) . '**' . $request->file('image-profile')->getClientOriginalName();
            $request->file('image-profile')->move(base_path() . '/public/uploads/profiles/', $imageName);
            $data['image-profile'] = $imageName;
        }
        $data['user_id'] = $user->id;
        $data['mobile'] = $data['mobile'].$data['mobile-1'];
        $data['phone'] = $data['phone'].$data['phone-1'].$data['phone-2'];

        Client::create($data);

    }
    public function redirectPath()
    {
        if (Auth::user()->role_id == 2 )
            return route('payClient');
        return route('admin');
    }

}
