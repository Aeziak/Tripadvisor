<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personne;
use App\Avis;
use App\Hotelier;
use App\Hotel;

class AbonneController extends Controller
{
    public function index() {
        $allAvis = Avis::All();
        $aviss = array();
        $allHotels = Hotel::All();

        if(!empty($_GET["abo_id"])){
            foreach($allAvis as $avis){
                if($avis->abo_id == $_GET["abo_id"]){
                    $aviss[] = $avis;
                }
             }
        }
        if(!empty($_COOKIE["htrid"])){
            foreach($allAvis as $avis){
                foreach($allHotels as $hotel){
                    if($avis->hot_id == $hotel->hot_id){
                        if($hotel->htr_id == $_GET["htr_id"]){
                            $aviss[] = $avis;
                        }
                    }
                }
            }
        }
        if(!empty($_COOKIE["htrid"])){
            $personnes = Hotelier::All();
        }else{
            $personnes = Personne::All();
        }

        return view("hotels-abonne", [ "personnes" => $personnes, "avis" => $aviss]);
    }
}
