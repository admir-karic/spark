<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<style>
		.vcenter{position: relative;top: 50%;transform: translateY(-50%);}
		.resize-none{resize:none;}
	</style>
</head>

<body>
<div class="nav-side-menu">
    <div class="brand">{{ Auth::user()->username }}</div>
	<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
        <ul id="menu-content" class="menu-content collapse out">
			<li>
                <a href="{{ url('/') }}"><div>
                    <i class="fas fa-home fa-lg"></i>
                        Home</div>
                </a>
            </li>

			<li data-toggle="collapse" data-target="#users" class="collapsed">
					<a href="#"><i class="fa fa-user fa-lg"></i> Users</a>
			</li>
			<ul class="sub-menu collapse" id="users">
                <li><a href="{{ route('users') }}"><div>Show users</div></a></li>
                <li><a href="{{ route('bannedUsers') }}"><div>Banned users</div></a></li>
            </ul>


            <li data-toggle="collapse" data-target="#games" class="collapsed">
                <a href="#"><i class="fas fa-gamepad fa-lg"></i> Games</a>
            </li>
            <ul class="sub-menu collapse" id="games">
                <li><a href="{{ route('games') }}"><div>Show games</div></a></li>
                <li><a href="{{ route('addGame') }}"><div>Add game</div></a></li>
            </ul>

            <li data-toggle="collapse" data-target="#categories" class="collapsed">
                <a href="#"><i class="fas fa-clipboard-list fa-lg"></i> Categories</a>
            </li>
            <ul class="sub-menu collapse" id="categories">
                <li><a href="{{ route('getCategories') }}"><div>Show categories</div></a></li>
                <li><a href="{{ route('addCategory') }}"><div>Add category</div></a></li>
                <li><a href="{{ route('addCategoryGame') }}"><div>Add category to a game</div></a></li>
            </ul>

            <li data-toggle="collapse" data-target="#languages" class="collapsed">
                <a href="#"><i class="fas fa-language fa-lg"></i> Languages</a>
            </li>

            <ul class="sub-menu collapse" id="languages">
                <li><a href="{{ route('getLanguages') }}"><div>Show languages</div></a></li>
                <li><a href="{{ route('addLanguage') }}"><div>Add language</div></a></li>
				<li><a href="{{ route('addLanguageGame') }}"><div>Add language to a game</div></a></li>
            </ul>

			<li data-toggle="collapse" data-target="#discounts" class="collapsed">
                <a href="#"><i class="fas fa-shopping-bag fa-lg"></i> Discounts</a>
            </li>
            <ul class="sub-menu collapse" id="discounts">
                <li><a href="{{ route('getDiscounts') }}"><div>Show discounts</div></a></li>
                <li><a href="{{ route('addDiscount') }}"><div>Add a discount</div></a></li>
            </ul>

			<li data-toggle="collapse" data-target="#specifications" class="collapsed">
                <a href="#"><i class="fas fa-desktop fa-lg"></i> Specifications</a>
            </li>
            <ul class="sub-menu collapse" id="specifications">
                <li><a href="{{ route('getSpecifications') }}"><div>Show specifications</div></a></li>
                <li><a href="{{ route('addSpecification') }}"><div>Add specification</div></a></li>
            </ul>

			<li data-toggle="collapse" data-target="#playernumbers" class="collapsed">
                <a href="#"><i class="fas fa-users fa-lg"></i> Player numbers</a>
            </li>
            <ul class="sub-menu collapse" id="playernumbers">
                <li><a href="{{ route('getPlayerNumbers') }}"><div>Show player numbers</div></a></li>
                <li><a href="{{ route('addPlayerNumber') }}"><div>Add player number</div></a></li>
            </ul>

			<li>
				<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
					<div>
						<i class="fas fa-sign-out-alt fa-lg"></i> {{ __('Logout') }}
					</div>
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</li>
        </ul>
    </div>
</div>
<div class="container" id="main">
    <div >
        <div >
            <div class="py-4">
                @yield('content')
            </div>
        </div>
    </div>
</div>



</body>
</html>