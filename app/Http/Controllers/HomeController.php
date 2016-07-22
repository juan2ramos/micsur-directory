<?php

namespace Directory\Http\Controllers;

use Illuminate\Http\Request;

use Directory\Http\Requests;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    function index(){
        return view('front.register');
    }
}
