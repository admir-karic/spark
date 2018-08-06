<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="csrf-token" content="{{ csrf_token() }}">

        <title>PlayZone</title>
		<!-- Scripts -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
		<style>
			.bg-black{background-color:#211f1f;}
			.text-black{color:black;}
			.fact-height{height:150px;}
			.vcenter{position: relative;top: 50%;transform: translateY(-50%);}
			.divcenter {position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);}
			.img-h{height:400px;}
			.bg-nav{background-color:#0c0c0c;}
			.resize-none{resize:none;}
			body{background-color:#211f1f;}
		</style>
		<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    </head>
    <body>
		<div class="navbar-brand"></div>
		<nav class="navbar navbar-expand-md navbar-dark bg-nav fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
					PlayZone
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
						
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        @if (Route::has('login'))
							@auth
								@if(Auth::user()->type=='admin')
									<li class="nav-item">
										<a class="nav-link" href="{{ route('admin') }}">Control Panel</a>
									</li>
								@endif
								<li class="nav-item">
									<a class="nav-link" href="{{ route('store') }}">Store</a>
								</li>
								@if(\Request::is('/'))
								<li class="nav-item">
									<a class="nav-link" href="#about">About</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#contact">Contact</a>
								</li>
								@endif
								<li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
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
							@else
								<li class="nav-item">
									<a class="nav-link" href="#about">About</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#contact">Contact</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{ route('login') }}">Login</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="{{ route('register') }}">Register</a>
								</li>
							@endauth
						@endif
                    </ul>
                </div>
            </div>
        </nav>

		<div class="container-fluid text-center">
			@yield('content')
		</div>
    </body>
</html>