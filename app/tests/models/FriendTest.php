<?php

use Zizaco\FactoryMuff\Facade\FactoryMuff;

class FriendTest extends TestCase
{
	public function testRelationWithUser()
	{
		$friend = FactoryMuff::create('Models\Friend');
		$this->assertFalse($friend->friend_id == $friend->user_id);
	}
}