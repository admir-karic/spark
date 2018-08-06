@extends('layouts.admin')
@section('content')
	<form action="{{ route('searchPlayerNumbers') }}"  method="post">
		@csrf
			<div class="row">
				<div class="col-3"></div>
				<div class="col-4">
					<input id="playernumber" type="text" class="form-control" name="playernumber" placeholder="Search...">
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
            <th scope="col">Name</th>
			<th scope="col">Delete player number</th>
        </tr>
        </thead>
        <tbody>
            @foreach($playerNumbers as $playerNumber)
             <tr>
                <td class="border-right">{{$playerNumber->name}}</td>
                <td><a href="{{ route('deletePlayerNumber',['playerNumber'=>$playerNumber]) }}">Delete</a></td>
             </tr>
            @endforeach
        </tbody>
    </table>
@endsection