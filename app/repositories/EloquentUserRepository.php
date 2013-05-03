<?php
namespace Repositories;

class EloquentUserRepository implements UserRepositoryInterface
{
	public function store(array $data)
	{
		return \User::create($data);
	}
}