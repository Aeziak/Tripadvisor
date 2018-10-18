<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoginHotel;

class LoginHotelController extends Controller
{
    public function login(){
    	return view ("hotels-login", [ ]);
    }

    public function checklogin(Request $request){
        $user = LoginHotel::whereIn('abo_pseudo', [$request->input("username")])->get();
            if($user[0]->abo_pseudo == $request->input("username") && $user[0]->abo_motpasse == $request->input("password")){
                echo "Oui";
            }
            return view("hotels-search", [ ]);
        //var_dump($users);
        
    }
}
