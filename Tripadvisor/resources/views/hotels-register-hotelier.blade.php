@extends('layouts.app')

@section('content')
	<h1>Inscription Hotelier</h1>
		<form method="post" action="{{ url("/hotel/confirmRegisterHotelier") }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" >
        <p>
				<label for="email">Email</label>
				<input type="mail" name="email">
			</p>
            <p>
				<label for="password">password</label>
				<input type="password" name="password" required>
			</p>
            <p>
				<label for="prenom">Prenom</label>
				<input type="text" name="prenom">
			</p>
            <p>
				<label for="nom">Nom</label>
				<input type="text" name="nom">
			</p>
            <p>
				<label for="adresse">Adresse</label>
				<input type="text" name="adresse">
			</p>
			<p>
				<label></label>
				<input type="submit" value="S'inscrire">
			</p>
		</form>
@endsection