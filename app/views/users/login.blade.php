@extends('layouts.default')

@section('content')
	<div class="row">
		@if(isset($loginerrors) && !empty($loginerrors))
			<p class="alert alert-error">
				{{ $loginerrors }}
			</p>
		@endif
		<div class="span4 offset4">
			<h3>Sign in</h3>
			{{ Form::open(array('url' => 'login', 'method' => 'POST')) }}
			{{ Form::token() }}
			<div class="control-group">
				{{ Form::label('username', 'Username') }}
				{{ Form::text('username', Input::old('username'), array('class' => 'span4', 'placeholder' => 'johndoe')) }}
			</div>
			<div class="control-group">
				{{ Form::label('password') }}
				{{ Form::password('password', array('class' => 'span4')) }}
			</div>
			{{ Form::submit('Sign in', array('class'=>'btn btn-large btn-block')) }}
			{{ Form::close() }}
		</div>
	</div>
@endsection