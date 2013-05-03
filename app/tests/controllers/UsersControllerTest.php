<?php

class UsersControllerTest extends TestCase
{
	public function testAddUserRequest()
	{
		$request = $this->call('POST', '/users', array(
			'name' => 'luiz',
			'email' => 'fulano@test.com',
			'password' => '123'
		));

		$this->assertTrue($request->isOk());
	}
}