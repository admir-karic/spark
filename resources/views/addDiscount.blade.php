@extends ('layouts.admin')
@section('content')
	<div id="error">
        <ul>
            @foreach( $errors->all() as $error)
                <li> {{$error}} </li>
            @endforeach
        </ul>
    </div>

	<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Add discount</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addDiscount') }}" aria-label="addDiscount">
                        @csrf

						<div class="form-group row">
                            <label for="code" class="col-md-3 col-form-label text-md-right">Code</label>

                            <div class="col-md-6">
                                <input id="code" name="code" class="form-control" type="text" >
                            </div>
                        </div>

						<div class="form-group row">
                            <label for="discountvalue" class="col-md-3 col-form-label text-md-right">Value</label>

                            <div class="col-md-6">
                                <input id="discountvalue" name="discountvalue" class="form-control" type="text" >
                            </div>
                        </div>

						<div class="form-group row">
							<div class="col-md-4"></div>
							<div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-block">Add</button>
                            </div>
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection