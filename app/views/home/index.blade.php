@extends('layouts.default')

@section('content')
	<div class="row">
		<div class="span7">
			<h3>Welcome to MyTwitter!</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, eveniet, mollitia aut maiores libero incidunt inventore nostrum saepe reprehenderit ipsum dolore perspiciatis est doloremque iusto provident enim dolorum dicta! Porro.</p>
		</div>

		<div class="span4 offset1">
			<h3>Join now!</h3>
			{{ Form::open(array('route' => 'adduser', 'method' => 'POST', 'id' => 'add_users')) }}
			{{ Form::token() }}
			
			{{ Form::label('name', 'Your name') }}
			{{ Form::text('name', Input::old('name'), array('class' => 'span4')) }}
			
			{{ Form::label('email', 'Your e-mail') }}
			{{ Form::text('email', Input::old('email'), array('class' => 'span4')) }}
			
			{{ Form::label('password', 'Your password') }}
			{{ Form::password('password', array('class' => 'span4')) }}
			
			{{ Form::submit('Register', array('class' => 'btn btn-primary btn-large btn-block')) }}
			
			{{ Form::close() }}
		</div>
	</div>
@endsection