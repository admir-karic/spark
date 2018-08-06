@extends ('layouts.admin')
@section('content')
	{{$game}}
	@foreach($checkbox as $checkbox)
		{{ $checkbox}}
	@endforeach
	@foreach($categories as $category)
		{{ $category}}
	@endforeach
@endsection