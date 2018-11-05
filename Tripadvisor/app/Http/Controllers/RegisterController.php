<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use App\RegisterHotelier;
use App\Personne;
use App\Hotelier;

class RegisterController extends Controller
{
    public function index(){
        return view('hotels-register', [ ]);
	}
	
	public function indexHotelier(){
        return view('hotels-register-hotelier', [ ]);
    }

    public function confirmRegister(Request $request){
    	$allAccount = Register::All();
    	$pseudo = array();
    	$mail = array();
    	foreach ($allAccount as $account) {
    		$pseudo[] = $account->abo_pseudo;
    		$nom[] = $account->abo_mel;
    	}
    	if(!empty($request) && !in_array($request->input("username"), $pseudo) && !in_array($request->input("email"), $mail)){
    		Register::insert(['abo_pseudo' => $request->input("username"), 'abo_motpasse' => $request->input("password"), 'abo_mel' => $request->input('email'), 'abo_prenom' => $request->input("prenom"), 'abo_nom' => $request->input("nom"), 'abo_adrligne1' => $request->input("adresse")]);
    		return redirect('hotel/search');
    	}else{
    		return redirect('hotel/register');
    	}
	}

	public function confirmRegisterHotelier(Request $request){
    	$allAccount = Hotelier::All();
    	$pseudo = array();
    	foreach ($allAccount as $account) {
    		$pseudo[] = $account->htr_mel;
    	}
    	if(!empty($request) && !in_array($request->input("email"), $pseudo)){
    		Hotelier::insert(['htr_mel' => $request->input("email"), 'htr_motpasse' => $request->input("password"), 'htr_prenom' => $request->input("prenom"), 'htr_nom' => $request->input("nom"), 'htr_adrligne1' => $request->input("adresse")]);
    		return redirect('hotel/search');
    	}else{
    		return redirect('hotel/registerHotelier');
    	}
	}
	
	public function editProfile(Request $request){
		return view('hotels-editprofile', [ "abo_pseudo" => $request->input("abo_pseudo"), "abo_prenom" => $request->input("abo_prenom"), "abo_nom" => $request->input("abo_nom"), "abo_motpasse" => $request->input("abo_motpasse")]);
	}

	public function updateProfile(Request $request){
		if(!empty($_COOKIE["aboid"])){
			Personne::where('abo_id', '=', $_COOKIE["aboid"])->update(['abo_pseudo' => $request->input('abo_pseudo'), 'abo_nom' => $request->input('abo_nom'), 'abo_prenom' => $request->input('abo_prenom')]);
			return redirect('hotel/displaypersonne?abo_id='.$_COOKIE["aboid"]);
		}else if(!empty($_COOKIE["htrid"])){
			Hotelier::where('htr_id', '=', $_COOKIE["htrid"])->update(['htr_nom' => $request->input('abo_nom'), 'htr_prenom' => $request->input('abo_prenom')]);
			return redirect('hotel/displaypersonne?htr_id='.$_COOKIE["htrid"]);
		}
		return redirect('hotels-search');
		
	}
}
