@extends('layouts.home')

@section('content')
<br>
<br>
<br>
	<div class="row">
		<div class="col-4">
			<img class="card-img-top" src="{{URL::asset('storage/images/'.$game->image)}}" height="200" alt="{{ $game->name }}">
		</div>

		<div class="col-2"></div>

		<div class="col-3">
				<form method="POST" action="{{ route('addOrder',['game'=>$game]) }}" aria-label="addOrder">
                        @csrf
						<div class="row">
                                <input id="discount" name="discount" class="form-control text-center" type="text" placeholder="Discount(optional)">
						</div>
						<br>
						<br>
						<div class="row">
							<button class="vcenter btn btn-danger btn-block" type="submit"><i class="fas fa-cart-plus"></i> Add To Cart</button>
						</div>
				</form>
						<br>
						<div class="row">
							<button class="vcenter btn btn-secondary btn-block" type="submit"><i class="fas fa-shopping-cart"></i> View Cart</button>
						</div>
			
		</div>
	</div>

	<br>

	<div class="row">
		
		<div class="col-4">
			<div class="row">
				<div class="col-4"></div>

				<div class="col-4 text-white">
					<h1> {{ $game->price }}&euro;</h1>
				</div>
			</div>

			<br>

			<br>

			<div class="row">
				<div class="col-2"></div>

				<div class="col-8 text-white text-left">
					Operating system
				</div>
			</div>

			<div class="row">
				<div class="col-2"></div>

				<div class="col-8 text-secondary">
					<p class="float-left text-left">{{ $game->specification->os }}</p>
				</div>
			</div>

			<div class="row">
				<div class="col-2"></div>

				<div class="col-8 text-white text-left">
					Processor
				</div>
			</div>

			<div class="row">
				<div class="col-2"></div>

				<div class="col-8 text-secondary">
					<p class="float-left text-left">{{ $game->specification->processor }}</p>
				</div>
			</div>

			<div class="row">
				<div class="col-2"></div>

				<div class="col-8 text-white text-left">
					Memory
				</div>
			</div>

			<div class="row">
				<div class="col-2"></div>

				<div class="col-8 text-secondary">
					<p class="float-left text-left">{{ $game->specification->memory }}</p>
				</div>
			</div>

			<div class="row">
				<div class="col-2"></div>

				<div class="col-8 text-white text-left">
					Graphics
				</div>
			</div>

			<div class="row">
				<div class="col-2"></div>

				<div class="col-8 text-secondary">
					<p class="float-left text-left">{{ $game->specification->graphics }}</p>
				</div>
			</div>

			<div class="row">
				<div class="col-2"></div>

				<div class="col-8 text-white text-left">
					Hard drive
				</div>
			</div>

			<div class="row">
				<div class="col-2"></div>

				<div class="col-8 text-secondary">
					<p class="float-left text-left">{{ $game->specification->hard_drive }}</p>
				</div>
			</div>

		</div>






		<div class="col-6">

			<div class="row">
				<h3 class="text-white float-left">{{$game->name}}</h3>
			</div>

			<br>

			<div class="row text-white text-left">
				{{ $game->developer }} | 			
					@foreach($game->categories as $categories)
						@if($categories->pivot->orderBy('category_id','desc')->first()->category_id==$categories->id)
							{{ $categories->name }}
						@else
						{{ $categories->name }},
						@endif
					@endforeach
			|	{{ date('d.m.Y',strtotime($game->release_date))}} | {{ $game->player_number->name }}
			</div>

			<div class="row">
				<div class="float-left text-white">
					@foreach($game->languages as $languages)
						@if($languages->pivot->orderBy('language_id','desc')->first()->language_id==$languages->id)
							{{ $languages->name }}
						@else
							{{ $languages->name }},
						@endif
					@endforeach
				</div>

			</div>

			<br>

			<div class="row bg-dark text-white border rounded pt-3 pb-3">
						<div class="ml-3">Reviews</div>
			</div>
			
			<br>

			@foreach($game->users as $reviews)
				<div class="row">
						<div class="col-1 text-white">{{ $reviews->username }}</div>
						<div class="col-10"></div>
						<div class="col-1 text-white float-right">{{ $reviews->pivot->value }}/5</div>
				</div>
				<div class="row">
						<div class="col-10 text-left text-white">{{ $reviews->pivot->comment }}</div>
				</div>
				<br>
				<div class="row border bottom border-secondary"></div>
			@endforeach
			<br>
			<div class="row">
				<form method="POST" action="{{ route('addReview',['game'=>$game]) }}" aria-label="addCategory">
                        @csrf
						<div class="form-row">
							<div class="form-group col-md-12">
								<select class="custom-select" id="rating" name="rating">
									@for ($i = 0; $i < 5; $i++)
										<option value="{{ $i+1 }}">{{ $i+1 }}</option>
									@endfor
								</select>
							</div>
						</div>

						<div class="form-group row">
                            <div class="col-md-12">
                                <textarea class="form-control resize-none" rows="4" cols="91" name="comment" id="comment"></textarea>
                            </div>
                        </div>

						<div class="form-group row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-block">Post review</button>
                            </div>
						</div>
                    </form>
				</div>
		</div>
	</div>
@endsection
