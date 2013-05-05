@extends('layouts.default')

@section('content')
	<div class="row findusers">
		<div class="span12">
			<h3>You can find your friends here</h3>
		</div>
	</div>
	<div class="row findusers">
		<div class="span6 offset3">
			{{ Form::open(array('method' => 'POST', 'class' => 'form-search')) }}
			{{ Form::token() }}
			<div class="input-prepend">
				<span class="add-on">@</span>
			{{ Form::text('username', Input::old('username'), array('placeholder' => 'johndoe', 'class' => 'input-large search-query')) }}
			</div>
			{{ Form::submit('Search', array('class' => 'btn btn-large')) }}
			{{ Form::close() }}
		</div>
	</div>
	@if(!is_null($users))
	<div class="row findusers result">
		<div class="span8 offset2">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Users</th>
						<th class="span2">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					@if(!count($users))
					<tr>
						<td colspan="2">
							No results
						</td>
					</tr>
					@else
						@foreach($users as $user)
						<tr>
							<td>{{$user->username}}</td>
							<td>
								@if(in_array($user->id, $friends_id))
									<button class="btn btn-block btn-danger">Unfollow</button>
								@else
									<button class="btn btn-block btn-success">Follow</button>
								@endif
							</td>
						</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
	@endif
@endsection