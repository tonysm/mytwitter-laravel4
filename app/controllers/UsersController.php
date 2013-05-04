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
			Auth::login($user);
			return Redirect::route('userhome')
				->with('message', 'Thanks for registering!');
		} else {
			return Redirect::to('/')
				->withErrors($user->errors());
		}
	}

	public function doLogin()
	{
		$data = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);

		if (Auth::attempt($data)) {
			return Redirect::route('userhome')
				->with('message', 'Welcome back!');
		} else {
			return $this->login()
				->with('loginerrors', 'Wrong username or password!');
		}
	}

	public function login()
	{
		return View::make('users.login');
	}

	public function index()
	{
		return "Hello user " . Auth::user()->username;
	}
}