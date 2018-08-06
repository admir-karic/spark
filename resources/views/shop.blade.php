@extends('layouts.home')

@section('content')
<br>
<br>
<div class="row">
@foreach($games as $game)
        <div class="col-lg-3 col-md-4 mb-3 bg-black">
              <div class="card h-100">
				<a href="{{ route('preview',['id'=>$game]) }}"><img class="card-img-top" src="{{URL::asset('storage/images/'.$game->image)}}" height="200" alt="{{ $game->name }}"></a>
				<div class="card-body">
                  <h4 class="card-title">
                    <a href="#">{{ $game->name }}</a>
                  </h4>
                  <h5>{{ $game->price }}&euro;</h5>
                  <p class="card-text">
				  @foreach ($game->categories as $categories)
					{{ $categories->name }}
					<br>
				  @endforeach
				  </p>
                </div>
			  </div>
        </div>
	@endforeach
</div>
@endsection
