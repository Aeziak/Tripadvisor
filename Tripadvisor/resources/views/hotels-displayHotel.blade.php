@extends('layouts.app')

@section('content')
	<h1>Liste des hotels</h1>

	<?php

	if(isset($_GET["typetri"])){
		if($_GET["typetri"] == "date"){
			for($i = count($aviss) - 2; $i >= 0; $i--) {
				for($j = 0; $j <= $i; $j++) {
					if($aviss[$j + 1]->avi_date > $aviss[$j]->avi_date) {
					$t = $aviss[$j + 1];
					$aviss[$j + 1] = $aviss[$j];
					$aviss[$j] = $t;
					}
				}
			}
		}else if($_GET["typetri"] == "greatest"){
			for($i = count($aviss) - 2; $i >= 0; $i--) {
				for($j = 0; $j <= $i; $j++) {
					if($aviss[$j + 1]->avi_noteglobale > $aviss[$j]->avi_noteglobale) {
					$t = $aviss[$j + 1];
					$aviss[$j + 1] = $aviss[$j];
					$aviss[$j] = $t;
					}
				}
			}
		}else if($_GET["typetri"] == "worst"){
			for($i = count($aviss) - 2; $i >= 0; $i--) {
				for($j = 0; $j <= $i; $j++) {
					if($aviss[$j + 1]->avi_noteglobale < $aviss[$j]->avi_noteglobale) {
					$t = $aviss[$j + 1];
					$aviss[$j + 1] = $aviss[$j];
					$aviss[$j] = $t;
					}
				}
			}
		}
	}

	?>

	@foreach($hotels as $hotel)
		@if($hotel->htr_id == $isHotelier)
			<form method="POST" action="{{ url('/hotel/editHotel') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}" >
				<input type="hidden" name="hot_id" value="<?php echo $_GET["hot_id"]; ?>"/>
				<input type="hidden" name="hot_nom" value="{{ $hotel->hot_nom }}"/>
				<input type="hidden" name="prx_id" value="{{ $hotel->prx_id }}"/>
				<input type="submit" value="Edit Hotel"/>
			</form>
		@endif
		<?php
		if(!empty($_COOKIE["aboid"])){
			$isFav = false;
			foreach($favoris as $fav){
				if($fav->abo_id == $_COOKIE["aboid"] && $fav->hot_id == $_GET["hot_id"]){
					$isFav = true;
				}
			}
			if($isFav == true){
		?>
			<a href="{{ url('/hotel/addFavoris/') }}?hot_id={{ $hotel->hot_id }}&lang=All&addFav=false"><h3>Retirer des favoris</h3></a>
		<?php
			}else{
		?>
			<a href="{{ url('/hotel/addFavoris/') }}?hot_id={{ $hotel->hot_id }}&lang=All&addFav=true"><h3>Ajouter aux favoris</h3></a>
		<?php
			}
		}
		?>
		<p>{{ $hotel->hot_nom }}<br/>{{ $hotel->hot_ville }}</p>
		<form method="get" action="{{url('/hotel/displayHotel')}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}" >
			<input type="hidden" name="hot_id" value="{{ $hotel->hot_id }}">
			<select name="lang">
				<option name="lang" value="All" selected>All</option> 
			 	<option name="lang" value="French">French</option> 
			 	<option name="lang" value="English">English</option> 	
			</select>
			<select name="typetri">
			 	<option name="typetri" value="date" selected>Date</option> 
			 	<option name="typetri" value="greatest">Meilleurs notes</option>
				 <option name="typetri" value="worst">Moins bonne notes</option> 	
			</select>
			<input type="submit" value="Choisir">
		</form>

		@foreach($photos as $photo)
			@if($hotel->hot_id == $photo->hot_id)
				<img src="http://infobanana.iut-acy.local/~vebervi/Tripadvisor/public/{{ $photo->pho_url}}" class="photoHotel">
			@endif
		@endforeach
	@endforeach

	<?php
		if(!empty($_COOKIE["isLogged"]) && $_COOKIE["isLogged"] == true && empty($_COOKIE["htrid"])){
	?>
			<form method="POST" action="{{ url('/hotel/addAvis') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}" >
				<input type="hidden" name="hot_id" value="<?php echo $_GET['hot_id']; ?>"/>
				<input type="hidden" name="lang" value="<?php echo $_GET['lang']; ?>"/>
				<p>
					<label for="titreavis">*Titre avis :</label>
				</p>
				<p>
					<input type="text" name="titreavis"/>
				<p>
				<p>
					<label for="avistext">*Votre avis :</label>
				</p>
				<p>
					<textarea name="avistext"></textarea>
				<p>
				<p>
					<select name="note">
						<option name="note" value="-" selected>-</option> 
						<option name="note" value="0">0</option> 
						<option name="note" value="1">1</option> 	
						<option name="note" value="2">2</option> 
						<option name="note" value="3">3</option> 	
						<option name="note" value="4">4</option> 
						<option name="note" value="5">5</option> 	
					</select>
				</p>
				<p>
					<label for="conseilavis">Conseil (optionnel) :</label>
				</p>
				<p>
					<input type="text" name="conseilavis"/>
				<p>
				<p>
					<input type="submit" value="Remettre"/>
				</p>
			</form>
	<?php
		}
	?>

	@foreach($aviss as $avis)
		<div class="comment">
		@foreach($personnes as $personne)
			@if($avis->abo_id == $personne->abo_id)
				<a href="{{ url('/hotel/displaypersonne') }}?abo_id={{ $personne->abo_id }}"><span class="personne">{{ $personne->abo_prenom }}</span></a>
			@endif
		@endforeach
		<span class="date">: {{ $avis->avi_date }}</span><br/>{{ $avis->avi_noteglobale }} : {{ $avis->avi_detail }}
		@foreach($photos as $photo)
			@if($avis->avi_id == $photo->avi_id)
					<div class="divPhotoAvis">
						<img src="http://infobanana.iut-acy.local/~vebervi/Tripadvisor/public/{{ $photo->pho_url}}" class="photoAvis">
					</div>
			@endif
		@endforeach
		</div>

		<!--<div id="allanswer">

		</div>	
		</div>-->
		@endforeach
	@endsection