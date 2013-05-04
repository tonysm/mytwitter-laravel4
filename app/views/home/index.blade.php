@extends('layouts.default')

@section('content')
	<div class="row">
		<div id="errormessagess" class="span12">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, ratione, recusandae quis voluptate enim non iusto quos provident repudiandae nihil officia tenetur rerum dolores eius vitae. Consectetur eum quis asperiores.
		</div>
		<div class="span7">
			<h3>Welcome to MyTwitter!</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, eveniet, mollitia aut maiores libero incidunt inventore nostrum saepe reprehenderit ipsum dolore perspiciatis est doloremque iusto provident enim dolorum dicta! Porro.</p>
		</div>

		<div class="span4 offset1">
			<h3>Join now!</h3>
			{{ Form::open(array('route' => 'adduser', 'method' => 'POST', 'id' => 'add_users')) }}
			{{ Form::token() }}
			
			{{ Form::label('username', 'Your name') }}
			{{ Form::text('username', Input::old('username'), array('class' => 'span4', 'placeholder' => 'johndoe')) }}
			
			{{ Form::label('email', 'Your e-mail') }}
			{{ Form::text('email', Input::old('email'), array('class' => 'span4', 'placeholder' => 'johndoe@example.com')) }}
			
			{{ Form::label('password', 'Your password') }}
			{{ Form::password('password', array('class' => 'span4', 'placeholder' => '********')) }}
			
			{{ Form::label('password_confirmation', 'Confirm your password') }}
			{{ Form::password('password_confirmation', array('class' => 'span4', 'placeholder' => '********')) }}

			{{ Form::submit('Register', array('class' => 'btn btn-primary btn-large btn-block')) }}
			
			{{ Form::close() }}
		</div>
	</div>
@endsection