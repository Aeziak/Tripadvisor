<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoginHotel;

class LoginHotelController extends Controller
{
    public function login(Request $request){
        if(isset($username) && !empty($username)){
            echo $username;
        }
    	return view ("hotels-login", [ ]);
    }

    public function checklogin(Request $request){
        $users = LoginHotel::All();
            foreach($users as $user){
                if($user->abo_pseudo == $request->input("username") && $user->abo_motpasse == $request->input("password")){
                    setcookie("username", $user->abo_pseudo, time()+3600);
				    setcookie("password", $user->abo_motpasse, time()+3600);
                }
            }
            return redirect('hotel/search');
        //var_dump($users);
    }

    public function logout(){
        setcookie("username", "", time()-3600);
        setcookie("password", "", time()-3600);
        return redirect('hotel/search');
    }
}
