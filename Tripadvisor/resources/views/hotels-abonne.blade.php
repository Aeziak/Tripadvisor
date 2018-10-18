@extends('layouts.app')

@section('title', 'Films')

@section('content')
	<h1>Abonne</h1>

    @foreach($personnes as $personne)
        @if($personne->abo_id == $_GET["abo_id"])
            <p>{{ $personne->abo_prenom }}</p>
            <h2>Avis déposés</h2>
            @foreach($avis as $avi)
                <hr>
                <span class="date">{{ $avi->avi_id }} : {{ $avi->avi_date }}</span><br/>{{ $avi->avi_noteglobale }} : {{ $avi->avi_detail }}</p>
            @endforeach
        @endif
    @endforeach
		
@endsection