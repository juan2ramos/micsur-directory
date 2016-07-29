<?php

namespace Directory\Http\Controllers\Admin;

use Directory\Entities\Client;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use Directory\Http\Requests;
use Directory\Http\Controllers\Controller;

class UserController extends Controller
{
    function index()
    {
        $clients = Client::with('user')->paginate(20);
        return view('admin.users', compact('clients'));
    }

    function payClient(Request $request)
    {
        $Client = Client::find($request->input('idUser'));
        $Client->validate = 1;
        $Client->save();
        return ['success' => 1];
    }

    function searchClient(Request $request)
    {
        $term = $request->input('search');
        $clients = Client::whereHas('user' , function($q) use($term){
            $q->whereRaw('email like "%' . $term . '%" or name like "%' . $term . '%"');
        })->paginate(20);
        return view('admin.users', compact('clients'));
    }
}
