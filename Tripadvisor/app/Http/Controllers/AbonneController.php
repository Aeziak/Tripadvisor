<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personne;
use App\Avis;

class AbonneController extends Controller
{
    public function index() {
        $allAvis = Avis::All();
        $aviss = array();

        foreach($allAvis as $avis){
            if($avis->abo_id == $_GET["abo_id"]){
                $aviss[] = $avis;
            }
        }

        return view("hotels-abonne", [ "personnes" => Personne::All(), "avis" => $aviss]);
    }
}
