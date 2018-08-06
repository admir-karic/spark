@extends('layouts.admin')
@section('content')
	<form action="{{ route('searchDiscounts') }}"  method="post">
		@csrf
			<div class="row">
				<div class="col-3"></div>
				<div class="col-4">
					<input id="discount" type="text" class="form-control" name="discount" placeholder="Search...">
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
			<th scope="col">Value</th>
			<th scope="col">Delete discount</th>
        </tr>
        </thead>
        <tbody>
            @foreach($discounts as $discount)
             <tr>
                <td class="border-right">{{$discount->code}}</td>
				<td class="border-right">{{$discount->value}}</td>
                <td><a href="{{ route('deleteDiscount',['discount'=>$discount]) }}">Delete</a></td>
             </tr>
            @endforeach
        </tbody>
    </table>
@endsection