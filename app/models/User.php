<?php
namespace Models;

use Zizaco\Confide\ConfideUser;

class User extends ConfideUser
{
	public $table = "users";
	
	public static $rules = array(
		'username' => 'required|unique:users',
		'email' => 'required|email|unique:users',
		'password' => 'required|min:6|confirmed'
	);
	public static $factory = array(
		'username' => 'string',
		'email' => 'email',
		'password' => '123456789',
		'password_confirmation' => '123456789'
	);

	public function friends()
	{
		return $this->hasMany('Models\Friend');
	}
}