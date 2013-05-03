<?php

class HomeControllerTest extends TestCase
{
	public function testCanAccessHome()
	{
		$request = $this->call('GET', '/');
		$this->assertTrue($request->isOk());
	}
}