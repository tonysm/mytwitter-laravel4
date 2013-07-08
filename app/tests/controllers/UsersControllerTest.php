<?php

use Zizaco\FactoryMuff\Facade\FactoryMuff;

class UsersControllerTest extends TestCase
{
	public function testRedirectsUserToUsersIndexAfterSaving()
	{
		$this->call('POST', 'users', array(
			'username' => 'loremipsum',
			'email' => 'lorem@ipsum.com',
			'password' => '123456',
			'password_confirmation' => '123456',
			'token' => Session::token()
		));

		$this->assertRedirectedToRoute('userhome');
	}

	public function testFails()
	{
		$this->assertFalse(true);
	}

	public function testRedirectsBackToHomeAfterSavesFails()
	{
		$this->call('POST', 'users', array(
			'username' => 'loremipsum',
			'email' => 'lorem@ipsum.com',
			'password' => '123',
			'password_confirmation' => '123',
			'token' => Session::token()
		));

		$this->assertRedirectedTo('/');
	}

	public function testLoginCorrectly()
	{
		$user = new Models\User();
		$user->username = 'loremipsum';
		$user->email = 'lorem@ipsum.com';
		$user->password = '123123';
		$user->password_confirmation = '123123';

		$user->save();

		$this->call('POST', 'login', array(
			'username' => $user->username,
			'password' => '123123'
		));

		$this->assertRedirectedToRoute('userhome');
	}

	public function testLoginViewIsDisplayedWhenLoginFails()
	{
		$this->call('POST', 'login', array(
			'username' => 'lorem',
			'password' => 'ipsum'
		));

		$this->assertViewHas('loginerrors');
		$this->assertNull(Auth::user());
	}

	public function testLoggedUserIsRedirectedToUserHomeWhenAccessingAppHome()
	{
		$user = FactoryMuff::create('Models\User');
		Auth::login($user);
		$this->call('GET', '/');

		$this->assertRedirectedToRoute('userhome');
	}

	public function testUserFindUsers()
	{
		$friend = FactoryMuff::create('Models\Friend');

		Auth::login($friend->user);
		$response = $this->call('GET', 'users/find');

		$this->assertTrue($response->isOk());
	}

	public function testUsersCanFindFriends()
	{
		$friend = FactoryMuff::create('Models\Friend');
		Auth::login($friend->user);

		$response = $this->call('POST', 'users/find', array(
			'username' => $friend->user_friend->username,
			'token' => Session::token()
		));

		$this->assertViewHas('users');
		$this->assertViewHas('friends_id');
		$this->assertTrue($response->isOk());
	}
}