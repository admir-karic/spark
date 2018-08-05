@extends('layouts.admin')
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
                <div class="card-header text-center">Add game</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addGame') }}" aria-label="addGame" enctype="multipart/form-data">
                        @csrf

						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="gamename" >Name</label>
                                <input id="gamename" name="gamename" class="form-control" type="text">
							</div>
							<div class="form-group col-md-6">
								<label for="developer">Developer</label>
                                <input id="developer" name="developer" class="form-control" type="text">
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="date" >Date</label>
                                <input id="date" name="date" class="form-control" type="date">
							</div>
							<div class="form-group col-md-6">
								<label for="price">Price</label>
                                <input id="price" name="price" class="form-control" type="text">
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="specification">Specification</label>
								<select class="form-control" id="specification" name="specification">
									@foreach($specifications as $specification)
									<option value="{{ $specification->id }}">{{ $specification->game }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-md-6">
								<label for="playernumber">Player number</label>
								<select class="form-control" id="playernumber" name="playernumber">
									@foreach($playerNumbers as $playerNumber)
									<option value="{{ $playerNumber->id }}">{{ $playerNumber->name }}</option>
									@endforeach
								</select>
							</div>
						</div>

                        <div class="form-group row">
                            <label for="imagefile" class="col-md-3 col-form-label text-md-right">File</label>

                            <div class="col-md-6">
                                <input id="imagefile" name="imagefile" class="form-control-file" accept="image/jpeg" type="file" >
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