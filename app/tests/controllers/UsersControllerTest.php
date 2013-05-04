<?php

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
}