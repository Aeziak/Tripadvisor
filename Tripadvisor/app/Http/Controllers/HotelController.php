<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Avis;
use App\reponseQuestion;
use App\QuestionHotel;
use App\Personne;
use App\Photo;
use App\Favoris;
use App\Services;
use App\ServicesHotel;
use App\FourchettePrix;
use Mail;

class HotelController extends Controller
{
    public function search(){
		return view("hotels-search", [ "services" => Services::All() ]);
	}
	
	public function searchResult(Request $request){
		
		$allHotels = Hotel::All();
		$hotels = array();
		$checkedServices = array();
		$servicesHotel = ServicesHotel::All();
		foreach($allHotels as $hotel){
			if(!empty($request->services)){
				foreach($request->services as $service){
					foreach($servicesHotel as $srvH){
						if($hotel->hot_id == $srvH->hot_id && $srvH->srv_id == $service){
							if(levenshtein($hotel->hot_ville, $request->input("ville")) <= 3 || $request->input("ville") == ""){
								if($request->input("note") != "-"){
									if($hotel->cat_nbetoiles == $request->input("note")){
										$hotels[] = $hotel;
									}
								}else{
									$hotels[] = $hotel;
								}
							}
						}
					}
				}
			}else{
				if(levenshtein($hotel->hot_ville, $request->input("ville")) <= 3 || $request->input("ville") == ""){
					if($request->input("note") != "-"){
						if($hotel->cat_nbetoiles == $request->input("note")){
							$hotels[] = $hotel;
						}
					}else{
						$hotels[] = $hotel;
					}
				}
			}
		}
		$hotels = array_unique($hotels);
		
		return view ("hotels-search-result", ["hotels" => $hotels, "services" => $checkedServices, "prix" => FourchettePrix::All()]);
	}

	public function list(){
		$hotels = Hotel::All();
		return view ("hotels-list", ["hotels" => $hotels, "prix" => FourchettePrix::All()]);
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
		$allFav = Favoris::All();
		$isHotelier = "oui";

		foreach ($allHotels as $hotel) {
			if($hotel->hot_id == $_GET["hot_id"]){
				$hotels[] = $hotel;
				if(!empty($_COOKIE["htrid"])){
					if($hotel->htr_id == $_COOKIE["htrid"]){
						$isHotelier = $_COOKIE["htrid"];
					}
				}
			}
		}
		foreach ($hotels as $hotel) {
			foreach ($allAvis as $avis) {
				if($_GET["lang"] == "English" || $_GET["lang"] == "French"){
					if($avis->hot_id == $hotel->hot_id && $avis->avi_langue == $_GET["lang"]){
						$aviss[] = $avis;
					}
				}else{
					if($avis->hot_id == $hotel->hot_id){
						$aviss[] = $avis;
					}
				}
			}
		}

		return view ("hotels-displayHotel", ["hotels" => $hotels, "aviss" => $aviss, "questions" => $questions,"reponses" => $reponses, "personnes" => $personnes, "photos" => $allPhotos, "favoris" => $allFav, "isHotelier" => $isHotelier]);
	}

	public function addAvis(Request $request){
		if((!empty($request->input("avistext")) && $request->input("avistext") != "") && ($request->input("note") != "-") && ((!empty($request->input("titreavis")) && $request->input("titreavis") != ""))){
			Avis::insert(['abo_id' => $_COOKIE["aboid"], 'hot_id' => $request->input("hot_id"), 'vis_id' => 1, 'per_id' => 13, 'avi_date' => date("Y-m-d"), 'avi_langue' => $request->input("lang"), 'avi_titre' => $request->input("titreavis"), 'avi_detail' => $request->input("avistext"), 'avi_noteglobale' => $request->input("note"), 'avi_conseil' => $request->input("conseilavis")]);
			$user = Personne::findOrFail($_COOKIE["aboid"]);
			Mail::send('hotels-search', ['user' => $user, 'services' => Services::All()], function ($m) use ($user) {
				global $request;
				$m->from('aeziak@gmail.com', 'Tripadvisor');
	
				$m->to($user->abo_mel, $user->abo_nom)->subject('Depot de votre avis : '.$request->input("titreavis"));
			});
			return redirect('hotel/displayHotel?hot_id='.$request->input("hot_id").'&lang='.$request->input("lang"));
		}else{
			return redirect('hotel/displayHotel?hot_id='.$request->input("hot_id").'&lang='.$request->input("lang"));
		}
	}

	public function addFavoris(){
		if(!empty($_GET["addFav"])){
			if($_GET["addFav"] == "true"){
				Favoris::insert(['abo_id' => $_COOKIE["aboid"], 'hot_id' => $_GET["hot_id"]]);
			}else{
				Favoris::where('abo_id', '=', $_COOKIE["aboid"])->where('hot_id', '=', $_GET["hot_id"])->delete();
			}
		}
		return redirect('hotel/displayHotel?hot_id='.$_GET["hot_id"].'&lang=All');
	}

	public function createHotel(Request $request){
		return view ("hotels-create-hotel", [ "htr_id" => $request->input("htr_id") ]);
	}

	public function confirmCreateHotel(Request $request){
		Hotel::insert(['htr_id' => $request->input("htr_id"), 'hot_nom' => $request->input("hot_nom"), 'prx_id' => $request->input("prx_id")]);
		return redirect('hotel/search');
	}

	public function editHotel(Request $request){
		return view('hotels-edit-hotel', ["hot_id" => $request->input("hot_id"), "hot_nom" => $request->input("hot_nom"), "prx_id" => $request->input("prx_id")]);
	}

	public function confirmEditHotel(Request $request){
		Hotel::where("hot_id", '=', $request->input("hot_id"))->update(["hot_nom" => $request->input("hot_nom"), "prx_id" => $request->input("prx_id")]);
		return redirect('hotel/search');
	}
}
