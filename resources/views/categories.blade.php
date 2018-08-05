@extends('layouts.admin')
@section('content')
	<form action="{{ route('searchCategories') }}"  method="post">
		@csrf
			<div class="row">
				<div class="col-3"></div>
				<div class="col-4">
					<input id="category" type="text" class="form-control" name="category" placeholder="Category name...">
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
			<th scope="col">Delete category</th>
        </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
             <tr>
                <td class="border-right">{{$category->name}}</td>
                <td><a href="{{ route('deleteCategory',['category'=>$category]) }}">Delete</a></td>
             </tr>
            @endforeach
        </tbody>
    </table>
@endsection