@extends('layouts.app')

<!--@section('title', 'Films')-->

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
		<p>{{ $hotel->hot_nom }}<br/>{{ $hotel->hot_ville }}</p>
		<form method="get" action="{{url('/hotel/displayHotel')}}">
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