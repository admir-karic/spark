@extends('layouts.admin')
@section('content')
		<table class="table border border-dark">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
			<th scope="col">Status</th>
			<th scope="col">Ban/Unban</th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
             <tr>
                <td class="border-right">{{$user->username}}</td>
                <td class="border-right">{{$user->email}}</td>
				@if($user->banned == false)
				<td class="border-right">Not banned</td>
                <td><a href="{{ route('banUser',['id'=>$user->id]) }}">Ban</a></td>
				@else
				<td class="border-right">Banned</td>
				<td><a href="{{ route('unbanUser',['id'=>$user->id]) }}">Unban</a></td>
				@endif
             </tr>
            @endforeach
        </tbody>
    </table>
@endsection