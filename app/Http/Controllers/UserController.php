<?php

namespace Directory\Http\Controllers;

use Directory\Entities\Country;
use Directory\Entities\Sector;
use Illuminate\Http\Request;
use Directory\Http\Controllers\Admin\UserController as User;

use Directory\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    function index()
    {
        $user = new User();
        return $user->showClient(Auth::user()->client->id);
    }
    function update(Request $request)
    {
        $user = new User();
        return $user->updateClient($request);
    }
}
