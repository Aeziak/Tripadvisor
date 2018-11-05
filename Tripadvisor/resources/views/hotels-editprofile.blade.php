@extends('layouts.app')

@section('content')
	<h1>Edition profile</h1>

    <form method="POST" action="{{ url('/hotel/updateProfile') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <?php
            if(!empty($_COOKIE["aboid"])){
         ?>
                <p>
                <label for="abo_pseudo">Pseudo</label>
                </p>
                <p>
                    <input type="text" name="abo_pseudo" value="{{ $abo_pseudo }}"/>
                </p>
        <?php
            }
        ?>
        <p>
            <label for="abo_nom">Nom</label>
        </p>
        <p>
            <input type="text" name="abo_nom" value="{{ $abo_nom }}"/>
        </p>
        <p>
            <label for="abo_prenom">Prenom</label>
        </p>
        <p>
            <input type="text" name="abo_prenom" value="{{ $abo_prenom }}"/>
        </p>
        <p>
            <input type="submit" value="valider"/>
        </p>

    </form>
		
@endsection