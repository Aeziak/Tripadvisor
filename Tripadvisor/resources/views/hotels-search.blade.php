@extends('layouts.app')

@section('content')
	<h1>Rechercher</h1>
		<form method="post" action="{{ url("/hotel/searchResult") }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" >
			<p>
				<label for="ville">Ville</label>
				<input type="text" name="ville">
			</p>
			<p>
				<label for="note">Nombre d'étoiles</label>
			</p>
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
				@foreach($services as $service)
					<p>
						<input type="checkbox" id="{{ $service->srv_libelle }}" name="services[]" value="{{ $service->srv_id }}">
						<label for="{{ $service->srv_id }}">{{ $service->srv_libelle }}</label>
					</p>
				@endforeach
			<p>
				<label></label>
				<input type="submit" value="Rechercher">
			</p>
		</form>
@endsection