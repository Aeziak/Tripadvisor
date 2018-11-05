@extends('layouts.app')

@section('content')
	<h1>Rechercher result</h1>
	@foreach($services as $service)
		<p>{{ $service }}</p>
	@endforeach
	@foreach($hotels as $hotel)
		<a class="hotelresult" href="{{ url('hotel/displayHotel/') }}?hot_id={{ $hotel->hot_id }}&lang=All"><p>{{ $hotel->hot_nom }} : {{ $hotel->hot_ville }}<br/>{{ $hotel->cat_nbetoiles }}/5<br/>
		@foreach($prix as $prx) 
			@if($prx->prx_id == $hotel->prx_id)
				{{ $prx->prx_fourchette }}
			@endif
		@endforeach</p></a>
	@endforeach
	
@endsection