@extends('layouts.admin')
@section('content')
	<form action="{{ route('searchSpecifications') }}"  method="post">
		@csrf
			<div class="row">
				<div class="col-3"></div>
				<div class="col-4">
					<input id="specification" type="text" class="form-control" name="specification" placeholder="Search...">
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
            <th scope="col">Game</th>
			<th scope="col">Operating system</th>
			<th scope="col">Processor</th>
			<th scope="col">Memory</th>
			<th scope="col">Graphics</th>
			<th scope="col">hard_drive</th>
			<th scope="col">Delete specification</th>
        </tr>
        </thead>
        <tbody>
            @foreach($specifications as $specification)
             <tr>
                <td class="border-right">{{$specification->game}}</td>
				<td class="border-right">{{$specification->os}}</td>
				<td class="border-right">{{$specification->processor}}</td>
				<td class="border-right">{{$specification->memory}}</td>
				<td class="border-right">{{$specification->graphics}}</td>
				<td class="border-right">{{$specification->hard_drive}}</td>
                <td><a href="{{ route('deleteSpecification',['specification'=>$specification]) }}">Delete</a></td>
             </tr>
            @endforeach
        </tbody>
    </table>
@endsection