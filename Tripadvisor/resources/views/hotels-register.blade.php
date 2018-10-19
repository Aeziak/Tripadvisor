@extends('layouts.app')

@section('title', 'Films')

@section('content')
	<h1>Rechercher</h1>
		<form method="post" action="{{ url("/hotel/registerController") }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" >
			<p>
				<label for="username">Username</label>
				<input type="text" name="username">
			</p>
            <p>
				<label for="password">password</label>
				<input type="text" name="password">
			</p>
            <p>
				<label for="email">Email</label>
				<input type="mail" name="email">
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
				<label for="pays">Pays</label>
				<input type="text" name="pays">
			</p>
            <p>
				<label for="cp">Code Postal</label>
				<input type="text" name="cp">
			</p>
            <p>
				<label for="tel">Téléphone</label>
				<input type="text" name="tel">
			</p>
			<p>
				<label></label>
				<input type="submit" value="S'inscrire">
			</p>
		</form>
@endsection