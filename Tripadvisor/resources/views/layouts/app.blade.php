<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <!--<a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>-->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto left-side">
                        <li class="nav-item">
                            <a href="{{ url('/hotel/list') }}">Les hotels</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/hotel/search') }}">Rechercher</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/') }}">Tripadvisor</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <?php 
                                if(!(empty($_COOKIE["username"]) && empty($_COOKIE["password"])) && !($_COOKIE["username"] == null || $_COOKIE["password"] == null)){
                                    setcookie("isLogged", true, time()+3600);
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/hotel/logout') }}">{{ __('Logout') }}</a>
                                    </li>
                                <?php
                                    if(!empty($_COOKIE['aboid'])){
                                ?>
                                        <li class="nav-item">
                                          <a class="nav-link" href="{{ url('hotel/displaypersonne/') }}?abo_id=<?php echo $_COOKIE['aboid']; ?>">Mon Compte</a>
                                        </li>
                                <?php
                                    }
                                    if(!empty($_COOKIE['htrid'])){
                                ?>
                                        <li class="nav-item">
                                          <a class="nav-link" href="{{ url('hotel/displaypersonne/') }}?htr_id=<?php echo $_COOKIE['htrid']; ?>">Mon Compte</a>
                                        </li>
                                <?php
                                    }
                                }else{
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/hotel/registerHotelier/') }}">{{ __('Register Hotelier') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/hotel/loginHotelier/') }}">{{ __('Login Hotelier') }}</a>
                                    </li>
                                    <span class="nav-item" style="color: #ffffff;"> | </span>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/hotel/register') }}">{{ __('Register') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/hotel/login/') }}">{{ __('Login') }}</a>
                                    </li>
                                    <?php
                                }
		                    ?>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
