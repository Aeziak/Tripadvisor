<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use App\RegisterHotelier;

class RegisterController extends Controller
{
    public function index(){
        return view('hotels-register', [ ]);
    }
}
