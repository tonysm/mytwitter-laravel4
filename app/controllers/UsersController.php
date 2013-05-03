<?php

use Repositories\UserRepositoryInterface as User;

class UsersController extends BaseController
{
	/**
	 * @var \Repositories\UserRepositoryInterface
	 */
	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function create()
	{
		$user = $this->user->store(Input::all());
	}
}