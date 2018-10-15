@extends('layouts.app')

@section('title', 'Films')

@section('content')
	<h1>Rechercher</h1>
		<form method="post" action="{{ url("/hotel/searchResult") }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" >
			<p>
				<label for="ville">Ville</label>
				<input type="text" name="ville">
			</p>
			<p>
				<label></label>
				<input type="submit" value="Rechercher">
			</p>
		</form>
@endsection