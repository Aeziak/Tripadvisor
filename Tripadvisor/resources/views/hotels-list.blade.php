@extends('layouts.app')

<!--@section('title', 'Films')-->

@section('content')
	<h1>Liste des hotels</h1>

	@foreach($hotels as $hotel)
		<a href="http://infobanana.iut-acy.local/~garciaju/Tripadvisor/Tripadvisor/public/hotel/displayHotel?hot_id={{ $hotel->hot_id }}&lang=French"><p>{{ $hotel->hot_nom }}<br/>{{ $hotel->hot_ville }}</p></a>
	@endforeach
		
@endsection