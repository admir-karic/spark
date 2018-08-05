@extends('layouts.admin')
@section('content')
	<form action="{{ route('searchGames') }}"  method="post">
		@csrf
			<div class="row">
				<div class="col-3"></div>
				<div class="col-4">
					<input id="gamename" type="text" class="form-control" name="gamename" placeholder="Search...">
				</div>
				<div class="col-2">
					<button type="submit" class="btn btn-primary btn-block"><i class="fas fa-search"></i></button>
				</div>
			</div>
	</form>
	<br>
	<table class="table border border-dark">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
			<th scope="col">Developer</th>
			<th scope="col">Release date</th>
			<th scope="col">Price</th>
			<th scope="col">Edit/Delete</th>
        </tr>
        </thead>
        <tbody>
            @foreach($games as $game)
             <tr>
                <td class="border-right"><img height=50 width=100 src="{{URL::asset('storage/images/'.$game->image)}}" alt="{{ $game->name }}"></td>
                <td class="border-right">{{$game->name}}</td>
                <td class="border-right">{{$game->developer}}</td>
                <td class="border-right">{{$game->release_date}}</td>
                <td class="border-right">{{$game->price}} &euro;</td>
                <td>
				<a href="{{ route('editGame',['game'=>$game]) }}">Edit</a>
				<a href="{{ route('deleteGame',['game'=>$game]) }}">Delete</a>
				</td>
             </tr>
            @endforeach
        </tbody>
    </table>
@endsection