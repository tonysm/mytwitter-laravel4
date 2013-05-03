@extends('layouts.default')

@section('content')
	{{ Form::open(array('route' => 'adduser', 'method' => 'POST', 'id' => 'add_users')) }}
	{{ Form::token() }}

	{{ Form::label('name', 'Your name') }}
	{{ Form::text('name', Input::old('name')) }}

	{{ Form::label('email', 'Your e-mail') }}
	{{ Form::text('email', Input::old('email')) }}

	{{ Form::label('password', 'Your password') }}
	{{ Form::password('password') }}

	{{ Form::submit('Register') }}

	{{ Form::close() }}
@endsection