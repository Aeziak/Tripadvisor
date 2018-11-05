@extends('layouts.app')

@section('content')
	<h1>Créer Hotel</h1>
		<form method="post" action="{{ url("/hotel/confirmEditHotel") }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" >
        <input type="hidden" name="hot_id" value="{{ $hot_id }}"/>
       		<p>
				<label for="hot_nom">Nom Hotel</label>
				<input type="text" name="hot_nom" value="{{ $hot_nom }}" required>
			</p>
            <p>
				<label for="prx_id">Prix id (1 : 0€ - 52€, 2 : 	52€ - 117€, 3 : 117€ - 169€, 4 : 169 €+)</label>
				<input type="text" name="prx_id" value="{{ $prx_id }}" required>
			</p>
			<p>
				<label></label>
				<input type="submit" value="Edit Hotel">
			</p>
		</form>
@endsection