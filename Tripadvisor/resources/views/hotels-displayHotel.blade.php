@extends('layouts.app')

<!--@section('title', 'Films')-->

@section('content')
	<h1>Liste des hotels</h1>

	@foreach($hotels as $hotel)
		<p>{{ $hotel->hot_nom }}<br/>{{ $hotel->hot_ville }}</p>
	@endforeach

	@foreach($aviss as $avis)
		{{ $avis->avi_noteglobale }} : {{ $avis->avi_detail }}<br/>
	@endforeach
		
@endsection