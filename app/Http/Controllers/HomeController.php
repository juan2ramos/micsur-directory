<?php

namespace Directory\Http\Controllers;

use Directory\Entities\Country;
use Illuminate\Http\Request;

use Directory\Http\Requests;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    function index(){
        $countries = Country::all();
        return view('front.register', compact('countries'));
    }
}
