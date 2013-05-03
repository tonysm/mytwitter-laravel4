<?php

class UserTest extends TestCase
{
	protected $model;

	public function setUp()
	{
		$this->model = App::make('Models\User');
	}

	public function tearDown()
	{
		$this->model = null;
	}

	public function testUserModelIsCorrect()
	{
		$this->assertInstanceOf("Models\\User", $this->model);
	}
	/**
	 * @dataProvider userWithInvalidNameDP
	 */
	public function testUserFailsToSaveWhenNameIsEmpty($user)
	{
		$validation = $this->model->validate($user);

		$this->assertTrue($validation->fails());
	}

	public function userWithInvalidNameDP()
	{
		return array(
			array(array('name' => '', 'email' => 'lorem@ipsum.com', 'password' => 'loremipsumdolor')),
			array(array('name' => null, 'email' => 'lorem@ipsum.com', 'password' => 'loremipsumdolor')),
			array(array('email' => 'lorem@ipsum.com', 'password' => 'loremipsumdolor'))
		);
	}

	public function userWithInvalidEmailDP()
	{
		return array(
			array(array('name' => 'lorem ipsum dolor', 'email' => '', 'password' => 'loremipsumdolor')),
			array(array('name' => 'lorem ipsum dolor', 'email' => '.@..com', 'password' => 'loremipsumdolor'))
		);
	}
	/**
	 * @dataProvider userWithInvalidEmailDP
	 */
	public function testUserFailsToSaveWhenEmailIsEmpty($user)
	{
		$validation = $this->model->validate($user);

		$this->assertTrue($validation->fails());
	}
}