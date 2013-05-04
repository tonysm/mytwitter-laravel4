<?php

use Models\User;

class UsersController extends BaseController
{
	public function create()
	{
		$user = new User;

		$user->username = Input::get('username');
		$user->email = Input::get('email');
		$user->password = Input::get('password');
		$user->password_confirmation = Input::get('password_confirmation');

		if ($user->save()) {
			Auth::attempt(array('username' => $user->username, 'password' => Input::get('password')));
			return Redirect::route('userhome')
				->with('message', 'Thanks for registering!');
		} else {
			return Redirect::to('/')
				->withErrors($user->errors());
		}
	}

	public function index()
	{
		return 'hello user!';
	}
}