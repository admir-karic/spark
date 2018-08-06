@extends('layouts.home')
@section('content')
	<div class="row position-relative">
		<img class="d-block w-100 img-h" src="{{URL::asset('storage/images/banner-image.jpg')}}" alt="Background image">
		<div class="divcenter text-black">
			<h1>Welcome to the PlayZone</h1>
			<h5>The ultimate platform for games.</h5>
			<a class="btn btn-danger" href="{{ route('register') }}">Register</a>
		</div>
	</div>

	<div id="about" class="row bg-black text-white">
		<div class="col-12">
			<div class="row fact-height">
				<div class="col-2"></div>
				<div class="col-8">
					<h3 class="vcenter">ABOUT US<h3>
					</div>
			</div>

			<div class="row">
				<div class="col-2"></div>
				<div class="col-8">
					<p>{{ $about }}<p>
					</div>
			</div>
		</div>
	</div>

	<div id="contact" class="row bg-black text-white border-top border-secondary">
		<div class="col-12">
			<div class="row fact-height">
				<div class="col-2"></div>
				<div class="col-8">
					<h3 class="vcenter">CONTACT<h3>
					</div>
			</div>

			<div class="row">
				<div class="col-2"></div>
				<div class="col-8">
					<a href="#"><i class="col-1 fab fa-facebook-square fa-lg"></i></a>
					<a href="#"><i class="fab fa-instagram fa-lg"></i></a>
					<br>
					<p>Email: example@mail.com<p>
					</div>
			</div>
		</div>
	</div>

	<div class="row bg-black text-white fact-height border-top border-secondary">
		<div class="col-12">
			<h3 class="vcenter">SOME FACTS<h3>
		</div>
	</div>
	<div class="row bg-black text-white fact-height">
			<div class="col-2"></div>
			<div class="col-8">
				<div class="row">
					<div class="col-4 border-right border-secondary">
						<h1>{{ $games }}</h1>
						<h6>Games</h6>
					</div>
					<div class="col-4 border-right border-secondary">
						<h1>{{ $users }}</h1>
						<h6>Clients<h6>
					</div>
					<div class="col-4">
						<h1>{{ $reviews }}</h1>
						<h6>Reviews</h6>
					</div>
				</div>
			</div>
	</div>
@endsection