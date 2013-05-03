@extends('layouts.default')

@section('content')
	<div class="row">
		<div class="span6">
			<h3>Welcome to MyTwitter!</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, eveniet, mollitia aut maiores libero incidunt inventore nostrum saepe reprehenderit ipsum dolore perspiciatis est doloremque iusto provident enim dolorum dicta! Porro.</p>
		</div>

		<div class="span4 offset2">
			<h3>Join now!</h3>
			{{ Form::open(array('route' => 'adduser', 'method' => 'POST', 'id' => 'add_users')) }}
			{{ Form::token() }}
			
			{{ Form::label('name', 'Your name') }}
			{{ Form::text('name', Input::old('name')) }}
			
			{{ Form::label('email', 'Your e-mail') }}
			{{ Form::text('email', Input::old('email')) }}
			
			{{ Form::label('password', 'Your password') }}
			{{ Form::password('password') }}
			
			{{ Form::submit('Register', array('class' => 'btn btn-primary btn-large')) }}
			
			{{ Form::close() }}
		</div>
	</div>
@endsection