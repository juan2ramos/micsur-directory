<?php

namespace Directory\Http\Controllers;

use Directory\Entities\Country;
use Directory\Entities\Sector;
use Illuminate\Http\Request;

use Directory\Http\Requests;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    function index(){
        $sectors = Sector::lists('name','id');
        $countries = Country::all();
        return view('front.register', compact('countries','sectors'));
    }
}
