<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Avis;

class HotelController extends Controller
{
    public function search(){
		return view("hotels-search", [ ]);
	}
	
	public function searchResult(Request $request){
		
		$allHotels = Hotel::All();
		$hotels = array();
		foreach($allHotels as $hotel){
			if(levenshtein($hotel->hot_ville, $request->input("ville")) <= 3){
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
		foreach ($allHotels as $hotel) {
			if($hotel->hot_id == $_GET["hot_id"]){
				$hotels[] = $hotel;
			}
		}
		foreach ($hotels as $hotel) {
			foreach ($allAvis as $avis) {
				if($avis->hot_id == $hotel->hot_id && $avis->avi_langue == $_GET["lang"]){
					$aviss[] = $avis;
				}
			}
		}

		return view ("hotels-displayHotel", ["hotels" => $hotels, "aviss" => $aviss]);
	}
}
