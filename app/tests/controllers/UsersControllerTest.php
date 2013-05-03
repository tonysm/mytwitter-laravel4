<?php

class UsersControllerTest extends TestCase
{
	public function testAddUserRequest()
	{
		$mock = Mockery::mock('Repositories\UserRepositoryInterface');
		$mock->shouldReceive('store')
			->once()
			->andReturn(true);

		$this->app->instance('Repositories\UserRepositoryInterface', $mock);

		$request = $this->call('POST', '/users', array(
			'name' => 'luiz',
			'email' => 'fulano@test.com',
			'password' => '123'
		));

		$this->assertTrue($request->isOk());
	}
}