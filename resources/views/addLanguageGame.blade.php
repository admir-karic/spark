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
                <div class="card-header text-center">Add category to a game</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addLanguageGame') }}" aria-label="addLanguageGame">
                        @csrf

						<div class="form-group row">
							<div class="col-md-4"></div>
                            <label for="game" class=" text-center col-md-4 col-form-label"><h4>Chose game</h4></label>
                            <select class="form-control" id="game" name="game">
									@foreach($games as $game)
									<option value="{{ $game->id }}">{{ $game->name }}</option>
									@endforeach
							</select>
                        </div>

						<div class="form-group row">
							<div class="col-md-4"></div>
                            <label for="languages" class=" text-center col-md-4 col-form-label"><h4>Chose categories</h4></label>
                            @foreach($languages as $language)
								<div class="col-md-6">
									<input type="checkbox" name="languages[]" id="{{ $language->name }}" value="{{ $language->id }}">
										<label for="{{ $language->name }}">{{ $language->name }}</label>
								</div>
							@endforeach
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