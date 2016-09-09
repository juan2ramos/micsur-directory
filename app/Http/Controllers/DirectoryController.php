<?php

namespace Directory\Http\Controllers;

use Directory\Entities\Client;
use Directory\User;
use Illuminate\Http\Request;

use Directory\Http\Requests;

class DirectoryController extends Controller
{
    public function index(){
        $users = Client::with(['user','sectors','countryName'])/*->orderBy('company', 'ASC')*/->paginate(20);
        return view('front.directory',compact('users'));
    }
}
