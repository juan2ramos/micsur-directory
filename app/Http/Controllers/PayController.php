<?php

namespace Directory\Http\Controllers;

use Illuminate\Http\Request;

use Directory\Http\Requests;

class PayController extends Controller
{
    function index(){
        return view('front.pay');
    }
}
