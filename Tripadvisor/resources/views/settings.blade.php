<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title')</title> <link rel="stylesheet" type="text/css" href="{{asset('css/beer.css')}}"/>
	</head>
	<body>
	<header>
		<h1>@yield('title')</h1>
	</header> @section('nav') <ul>
		<p>{{ echo "p"; }}</p>
	</body>
</html>