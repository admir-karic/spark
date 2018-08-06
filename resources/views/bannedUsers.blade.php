@extends('layouts.admin')
@section('content')
		<form action="{{ route('searchUser') }}"  method="post">
		@csrf
			<div class="row">
				<div class="col-3"></div>
				<div class="col-4">
					<input id="username" type="text" class="form-control" name="username" placeholder="Search...">
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
            <th scope="col">Username</th>
            <th scope="col">Email</th>
			<th scope="col">Unban</th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
             <tr>
                <td class="border-right">{{$user->username}}</td>
                <td class="border-right">{{$user->email}}</td>
				<td><a href="{{ route('unbanUser',['id'=>$user->id]) }}">Unban</a></td>
             </tr>
            @endforeach
        </tbody>
    </table>
@endsection