@extends('layouts.app')

@section('content')
	<h1>Connexion</h1>
	<form method="post" action="{{ url("/hotel/loginconfirmHotelier") }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" >
			<p>
				<label for="username">Username</label>
				<input type="text" name="username" required>
			</p>
			<p>
				<label for="password">Password</label>
				<input type="password" name="password" required>
			</p>
			<p>
				<label></label>
				<input type="submit" value="Rechercher">
			</p>
		</form>

		
@endsection