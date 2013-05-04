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
}