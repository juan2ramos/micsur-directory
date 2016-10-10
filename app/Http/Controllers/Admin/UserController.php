<?php

namespace Directory\Http\Controllers\Admin;

use Directory\Entities\Client;
use Directory\Entities\Country;
use Directory\Entities\Log;
use Directory\Entities\Sector;
use Directory\User;
use Illuminate\Http\Request;

use Directory\Http\Requests;
use Directory\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Jenssegers\Date\Date;

class UserController extends Controller
{
    function index()
    {
        $clients = Client::with('user')->paginate(20);
        return view('admin.users', compact('clients'));
    }
    function showClient($id){
        $countries = Country::all();
        $sectors = Sector::lists('name','id');
        $client = Client::find($id);

        return view('admin.user', compact('client','countries','sectors'));
    }
    function updatePayClient(Request $request)
    {
        $client = Client::find($request->input('idUser'));
        $client->validate = 1;
        $client->save();
        $user = $client->user;
        Log::create([
            'user_id' => auth()->user()->id,
            'action' => 'UserController@updatePayClient',
            'table' => 'client@validate',
            'data' => 'client.id: ' . $request->input('idUser')
        ]);
        Mail::send('emails.registerPay', ['user' => $user], function ($m) use ($user) {
             $m->from('coordinaciondirectorio@micsur.org ', 'Directorio Micsur');
             $m->bcc('coordinaciondirectorio@micsur.org');
             $m->to($user->email, $user->name)->subject('Tu pago ha sido registrado!');
    
         });
        return ['success' => 1];
    }

    function searchClient(Request $request)
    {
        $term = $request->input('search');

        $clients = Client::whereHas('user', function ($q) use ($term) {
            $q->where('name', 'like', '%' .$term . '%')
            ->orWhere('email', 'like', '%' .$term . '%');
        })->paginate(20);

        return view('admin.users', compact('clients'));
    }

    function updateClient(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $this->updateClientSave($request);

        return redirect()->back()->with('success', true);
    }

    private function updateClientSave($request){
        $data = $request->all();

        $data['mobile'] = $data['mobile'].$data['mobile-1'];
        $data['phone'] = $data['phone'].$data['phone-1'].$data['phone-2'];

        $user = User::find($data['user_id']);
        $client = $user->client;

        $user->name = $data['name'];
        $user['last-name'] = $data['last-name'];

        if(!empty($data['password'])){
            $user->password = bcrypt($data['password']);
            $user['password_2'] = md5($data['password']);

        }
        $user['identification-number'] = $data['identification-number'];
        if ($request->hasFile('image-profile')) {
            $imageName = str_random(40) . '**' . $request->file('image-profile')->getClientOriginalName();
            $request->file('image-profile')->move(base_path() . '/public/uploads/profiles/', $imageName);

            $user['image-profile'] = $imageName;

        }
        $user->email = $data['email'];

        $client->company =  $data['company'];
        $client->country =  $data['country'];
        $client->address =  $data['address'];
        $client->activities =  $data['activities'];
        $client->website =  $data['website'];
        $client->mobile =  $data['mobile'];
        $client->phone =  $data['phone'];

        $user->client()->save($client);
        $user->save();
        $client->sectors()->sync($data['sector']);

    }
    function usersExcel(){
        Excel::create('reporte ' . $date, function ($excel) {
            $groups = Group::whereHas('call', function ($query) {
                $query->whereRaw('convocatoria = 2016');
            })->where('id', '>', '31')->with('call')->get();
            $excel->sheet('reporte', function ($sheet) use ($groups) {
                $sheet->setCellValue('A2', 'Año');
                $sheet->setCellValue('B2', 'Inscritos');
                $sheet->setCellValue('C2', 'Finalizados');
                $sheet->setCellValue('E2', 'Inscritos');
                $sheet->setCellValue('E3', 'Inscritos finalizados');
                $sheet->setCellValue('A3', '2013');
                $sheet->setCellValue('A4', '2014');
                $sheet->setCellValue('A5', '2014');
                $sheet->setCellValue('A6', '2016');
                $registers = Group::where('id', '>', '31')->count();
                $finish = Call::whereRaw('convocatoria = 2016 and fecha_finalizacion IS NOT NULL and id_grupos_musica > 31')->count();
                $thirteen = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2013 and id_grupos_musica > 31 ')->count();
                $fourteen = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2014 and id_grupos_musica > 31 ')->count();
                $fifteen = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2015 and id_grupos_musica > 31 ')->count();
                $sixteen = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2016 and id_grupos_musica > 31 ')->count();
                $thirteenFinish = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2013 and id_grupos_musica > 31 and fecha_finalizacion IS NOT NULL')->count();
                $fourteenFinish = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2014 and id_grupos_musica > 31 and fecha_finalizacion IS NOT NULL')->count();
                $fifteenFinish = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2015 and id_grupos_musica > 31 and fecha_finalizacion IS NOT NULL')->count();
                $sixteenFinish = Call::whereRaw('convocatoria = 2016 and inscripcion_inicial = 2016 and id_grupos_musica > 31 and fecha_finalizacion IS NOT NULL')->count();
                $sheet->setCellValue('B3', $thirteen);
                $sheet->setCellValue('B4', $fourteen);
                $sheet->setCellValue('B5', $fifteen);
                $sheet->setCellValue('B6', $sixteen);
                $sheet->setCellValue('C3', $thirteenFinish);
                $sheet->setCellValue('C4', $fourteenFinish);
                $sheet->setCellValue('C5', $fifteenFinish);
                $sheet->setCellValue('C6', $sixteenFinish);
                $sheet->setCellValue('F2', $registers);
                $sheet->setCellValue('F3', $finish);
                $groups = Group::whereHas('call', function ($query) {
                    $query->whereRaw(' convocatoria = 2016  and id_grupos_musica > 31 ');
                })->with(['call' => function ($q) {
                    $q->whereRaw(' convocatoria = 2016  and id_grupos_musica > 31 ');
                }])->orderBy('id', 'desc')->get();
                $i = 9;
                $sheet->appendRow(8,
                    ['id', 'Nombre', 'Año inscripción', 'Fecha de inscripción', 'Fecha de Finalizacion', 'Formulario'
                    ]);
                foreach ($groups as $group) {
                    $sheet->appendRow($i,
                        [$group->id, $group->name, $group->call->inscripcion_inicial
                            , $group->date_human, $group->call->date_human, $group->call->step
                        ]);
                    $i++;
                }
            });
        })->export('xls');
        $date = Date::now()->format('l j F H:i:s');
    }

    protected function validator(array $data)
    {

        $v =  Validator::make($data, [
            'name' => 'required|max:255',
            'last-name' => 'required|max:255',
            'email' => 'unique:users,email,'.$data['user_id'],
            'identification-number' => 'required|max:255',


            'company' => 'required|max:255',
            'country' => 'required|max:255',
            'activities' => 'required|max:401',
            'address' => 'required|max:255',
            'mobile' => 'required|max:255',
            'mobile-1' => 'required|max:255',
            'sector' => 'required',
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
        $v->sometimes('image-profile', 'mimes:jpeg,jpg,png,gif|max:20000', function($data) {
            return !empty($data['image-profile']);
        });
        $v->sometimes('password', 'min:6', function($data) {
            return !empty($data->password);
        });


        return $v;

    }

}

