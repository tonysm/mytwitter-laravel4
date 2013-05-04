@extends('layouts.default')

@section('content')
	<div class="modal hide fade" id="loginmodal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3>Modal header</h3>
		</div>
		<div class="modal-body">
			<p>One fine body…</p>
		</div>
		<div class="modal-footer">
			<a href="#loginmodal" role="button" class="btn" data-toggle="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	<div class="row">
		@if($errors->count())
		<div id="errormessagess" class="span12 alert alert-error">
			<p>Ooops, it seems you have made some mistakes.</p>
			<ul>
				{{ $errors->first('username', '<li>:message</li>') }}
				{{ $errors->first('email', '<li>:message</li>') }}
				{{ $errors->first('password', '<li>:message</li>') }}
				{{ $errors->first('password_confirmation', '<li>:message</li>') }}
			</ul>
		</div>
		@endif
		<div class="span7">
			<h3>Welcome to MyTwitter!</h3>
			<p>Oops, it seems you have made some mistakes.</p>
			<ul>
				{{ $errors->first('username', '<li>:message</li>') }}
				{{ $errors->first('email', '<li>:message</li>') }}
				{{ $errors->first('password', '<li>:message</li>') }}
				{{ $errors->first('password_confirmation', '<li>:message</li>') }}
			</ul>
		</div>

		<div class="span4 offset1">
			<h3>Join now!</h3>
			{{ Form::open(array('route' => 'adduser', 'method' => 'POST', 'id' => 'add_users')) }}
			{{ Form::token() }}
			<div class="control-group {{ $errors->has('username') ? 'error' : '' }}">
			{{ Form::label('username', 'Your name') }}
			{{ Form::text('username', Input::old('username'), array('class' => 'span4', 'placeholder' => 'johndoe')) }}
			</div>
			<div class="control-group {{ $errors->has('email') ? 'error' : '' }}">
			{{ Form::label('email', 'Your e-mail') }}
			{{ Form::text('email', Input::old('email'), array('class' => 'span4', 'placeholder' => 'johndoe@example.com')) }}
			</div>
			<div class="control-group {{ $errors->has('password') ? 'error' : '' }}">
			{{ Form::label('password', 'Your password') }}
			{{ Form::password('password', array('class' => 'span4', 'placeholder' => '********')) }}
			</div>
			<div class="control-group {{ $errors->has('password') ? 'error' : '' }}">
			{{ Form::label('password_confirmation', 'Confirm your password') }}
			{{ Form::password('password_confirmation', array('class' => 'span4', 'placeholder' => '********')) }}
			</div>
			{{ Form::submit('Register', array('class' => 'btn btn-primary btn-large btn-block')) }}
			
			{{ Form::close() }}
		</div>
	</div>
@endsection