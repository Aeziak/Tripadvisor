<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Avis;
use App\reponseQuestion;
use App\QuestionHotel;
use App\Personne;
use App\Photo;

class HotelController extends Controller
{
    public function search(){
		return view("hotels-search", [ ]);
	}
	
	public function searchResult(Request $request){
		
		$allHotels = Hotel::All();
		$hotels = array();
		foreach($allHotels as $hotel){
			if($request->input("ville") != ""){
				if(levenshtein($hotel->hot_ville, $request->input("ville")) <= 3){
					$hotels[] = $hotel;
				}
			}else{
				$hotels[] = $hotel;
			}
		}
		
		return view ("hotels-search-result", ["hotels" => $hotels]);
	}

	public function list(){
		$hotels = Hotel::All();
		return view ("hotels-list", ["hotels" => $hotels]);
	}

	public function displayHotel(){

		$allHotels = Hotel::All();
		$hotels = array();
		$allAvis = Avis::All();
		$aviss = array();
		$reponses = reponseQuestion::All();
		$questions = QuestionHotel::All();
		$personnes = Personne::All();
		$allPhotos = Photo::All();

		foreach ($allHotels as $hotel) {
			if($hotel->hot_id == $_GET["hot_id"]){
				$hotels[] = $hotel;
			}
		}
		foreach ($hotels as $hotel) {
			foreach ($allAvis as $avis) {
				if($_GET["lang"] == "English" || $_GET["lang"] == "French"){
					if($avis->hot_id == $hotel->hot_id && $avis->avi_langue == $_GET["lang"]){
						$aviss[] = $avis;
					}
				}else{
					$aviss[] = $avis;
				}
			}
		}

		return view ("hotels-displayHotel", ["hotels" => $hotels, "aviss" => $aviss, "questions" => $questions,"reponses" => $reponses, "personnes" => $personnes, "photos" => $allPhotos]);
	}
}
