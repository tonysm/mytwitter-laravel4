<?php
namespace Models;

use Eloquent,
	Validator;

class User extends Eloquent
{
	public static $rules = array(
		'name' => 'required|min:10|max:150',
		'email' => 'required|email|unique:users',
		'password' => 'required'
	);

	public function validate(array $data)
	{
		return Validator::make($data, self::$rules);
	}
}