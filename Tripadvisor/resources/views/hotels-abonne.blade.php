@extends('layouts.app')


@section('content')
	<?php
        if(!empty($_COOKIE["htrid"])){
    ?>
            <h1>Hotelier</h1>
            @foreach($personnes as $personne)
                @if($personne->htr_id == $_GET["htr_id"])
                    <h3>{{ $personne->htr_prenom }}</h3>
                    <?php
                        if(!empty($_COOKIE["htrid"])){
                            if($_GET["htr_id"] == $_COOKIE["htrid"]){
                    ?>
                                <form method="POST" action="{{ url('/hotel/editProfile') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="abo_nom" value="{{ $personne->htr_nom }}"/>
                                    <input type="hidden" name="abo_prenom" value="{{ $personne->htr_prenom }}"/>
                                    <input type="submit" name="editprofile" value="Edit Profile"/>
                                </form>
                                <form method="POST" action="{{ url('/hotel/createHotel') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="htr_id" value="{{ $personne->htr_id }}"/>
                                    <input type="submit" name="editprofile" value="Creer Hotel"/>
                                </form>
                    <?php
                            }
                        }
                    ?>
                    <h2>Avis sur mon hotel</h2>
                    @foreach($avis as $avi)
                        <hr>
                        <span class="date">{{ $avi->avi_id }} : {{ $avi->avi_date }}</span><br/>{{ $avi->avi_noteglobale }} : {{ $avi->avi_detail }}</p>
                    @endforeach
                @endif
            @endforeach
    <?php
        }else{
            ?>
                    <h1>Abonne</h1>
                    @foreach($personnes as $personne)
                        @if($personne->abo_id == $_GET["abo_id"])
                            <h3>{{ $personne->abo_prenom }}</h3>
                            <?php
                                if(!empty($_COOKIE["aboid"])){
                                    if($_GET["abo_id"] == $_COOKIE["aboid"]){
                            ?>
                                        <form method="POST" action="{{ url('/hotel/editProfile') }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="abo_pseudo" value="{{ $personne->abo_pseudo }}"/>
                                            <input type="hidden" name="abo_motpasse" value="{{ $personne->abo_motpasse }}"/>
                                            <input type="hidden" name="abo_nom" value="{{ $personne->abo_nom }}"/>
                                            <input type="hidden" name="abo_prenom" value="{{ $personne->abo_prenom }}"/>
                                            <input type="submit" name="editprofile" value="Edit Profile"/>
                                        </form>
                            <?php
                                    }
                                }
                            ?>
                            <h2>Avis déposés</h2>
                            @foreach($avis as $avi)
                                <hr>
                                <span class="date">{{ $avi->avi_id }} : {{ $avi->avi_date }}</span><br/>{{ $avi->avi_noteglobale }} : {{ $avi->avi_detail }}</p>
                            @endforeach
                        @endif
                    @endforeach
            <?php
                }

    ?>
		
@endsection