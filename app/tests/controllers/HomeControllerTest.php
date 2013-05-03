<?php

class HomeControllerTest extends TestCase
{
	public function testCanAccessHome()
	{
		$request = $this->call('GET', '/');
		$this->assertTrue($request->isOk());
	}

	public function testIndexHasAddUsersForm()
	{
		$request = $this->client->request('GET', '/');

		$this->assertCount(1, $request->filter('form#add_users'));
	}
}