<?php

namespace Directory\Http\Controllers\Admin;

use Directory\Entities\Client;
use Directory\Entities\Log;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use Directory\Http\Requests;
use Directory\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    function index()
    {
        $clients = Client::with('user')->paginate(20);
        return view('admin.users', compact('clients'));
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
}
