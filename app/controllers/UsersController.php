<?php

use Models\User,
	Models\Friend;

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
		return View::make('users.index');
	}

	public function findUsers()
	{
		$username = Input::get('username');

		if (isset($username) && !empty($username)) {
			$users =  User::where('username', 'like', "%{$username}%")
							->where('id', "!=", Auth::user()->id)
							->get();
			$friends = Auth::user()->friends()->get();
			$friends_id = array();
			foreach ($friends as $f) {
				$friends_id[] = $f->friend_id;
			}
			
		} else {
			$users = null;
			$friends_id = array();
		}

		return View::make('users.find')
			->with('users', $users)
			->with('friends_id', $friends_id);
	}
}