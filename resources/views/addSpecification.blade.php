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
                <div class="card-header text-center">Add specification</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addSpecification') }}" aria-label="addSpecification">
                        @csrf

						<div class="form-group row">
                            <label for="game" class="col-md-3 col-form-label text-md-right">Game</label>

                            <div class="col-md-6">
                                <input id="game" name="game" class="form-control" type="text" >
                            </div>
                        </div>

						<div class="form-group row">
                            <label for="os" class="col-md-3 col-form-label text-md-right">Operating system</label>

                            <div class="col-md-6">
                                <textarea id="os" name="os" class="form-control resize-none" rows="3"></textarea>
                            </div>
                        </div>

						<div class="form-group row">
                            <label for="processor" class="col-md-3 col-form-label text-md-right">Processor</label>

                            <div class="col-md-6">
                                <textarea id="os" name="os" class="form-control resize-none" rows="3"></textarea>
                            </div>
                        </div>

						<div class="form-group row">
                            <label for="memory" class="col-md-3 col-form-label text-md-right">Memory</label>

                            <div class="col-md-6">
                                <input id="memory" name="memory" class="form-control" type="text" >
                            </div>
                        </div>

						<div class="form-group row">
                            <label for="graphics" class="col-md-3 col-form-label text-md-right">Graphics</label>

                            <div class="col-md-6">
                                <textarea id="graphics" name="graphics" class="form-control resize-none" rows="3"></textarea>
                            </div>
                        </div>

						<div class="form-group row">
                            <label for="hd" class="col-md-3 col-form-label text-md-right">Hard drive</label>

                            <div class="col-md-6">
                                <input id="hd" name="hd" class="form-control" type="text" >
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