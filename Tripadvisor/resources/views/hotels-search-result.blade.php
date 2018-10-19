@extends('layouts.app')
<!--@section('title', 'Films')-->

@section('content')
	<h1>Rechercher result</h1>
	
	@foreach($hotels as $hotel)
		<a class="hotelresult" href="http://infobanana.iut-acy.local/~vebervi/Tripadvisor/public/hotel/displayHotel?hot_id={{ $hotel->hot_id }}&lang=All"><p>{{ $hotel->hot_nom }} : {{ $hotel->hot_ville }}</p></a>
	@endforeach
	
@endsection