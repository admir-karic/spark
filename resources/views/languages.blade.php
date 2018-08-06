@extends('layouts.admin')
@section('content')
	<form action="{{ route('searchLanguages') }}"  method="post">
		@csrf
			<div class="row">
				<div class="col-3"></div>
				<div class="col-4">
					<input id="language" type="text" class="form-control" name="language" placeholder="Search...">
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
			<th scope="col">Delete language</th>
        </tr>
        </thead>
        <tbody>
            @foreach($languages as $language)
             <tr>
                <td class="border-right">{{$language->name}}</td>
                <td><a href="{{ route('deleteLanguage',['language'=>$language]) }}">Delete</a></td>
             </tr>
            @endforeach
        </tbody>
    </table>
@endsection