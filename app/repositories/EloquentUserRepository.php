<?php
namespace Repositories;

use Models\User;

class EloquentUserRepository implements UserRepositoryInterface
{
	public function store(array $data)
	{
		return User::create($data);
	}
}