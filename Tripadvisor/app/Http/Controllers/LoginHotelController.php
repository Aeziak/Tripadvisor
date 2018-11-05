<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoginHotel;
use App\Hotelier;

class LoginHotelController extends Controller
{
    public function login(Request $request){
        if(isset($username) && !empty($username)){
            echo $username;
        }
    	return view ("hotels-login", [ ]);
    }

    public function loginHotelier(Request $request){
        return view ("hotels-login-hotelier", [ ]);
    }

    public function checklogin(Request $request){
        $users = LoginHotel::All();
            foreach($users as $user){
                if($user->abo_pseudo == $request->input("username") && $user->abo_motpasse == $request->input("password")){
                    setcookie("username", $user->abo_pseudo, time()+3600);
                    setcookie("password", $user->abo_motpasse, time()+3600);
                    setcookie("aboid", $user->abo_id, time()+3600);
                }
            }
            return redirect('hotel/search');
        //var_dump($users);
    }

    public function checkloginHotelier(Request $request){
        $users = Hotelier::All();
        foreach($users as $user){
            if($user->htr_mel == $request->input("username") && $user->htr_motpasse == $request->input("password")){
                setcookie("username", $user->htr_mel, time()+3600);
                setcookie("password", $user->htr_motpasse, time()+3600);
                setcookie("htrid", $user->htr_id, time()+3600);
            }
        }
        return redirect('hotel/search');
    }

    public function logout(){
        setcookie("username", "", time()-3600);
        setcookie("password", "", time()-3600);
        setcookie("aboid", "", time()-3600);
        setcookie("htrid", "", time()-3600);
        setcookie("isLogged", "", time()-3600);
        return redirect('hotel/search');
    }
}
