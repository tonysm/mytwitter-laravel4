<?php
namespace Models;

use LaravelBook\Ardent\Ardent;

class Friend extends Ardent
{
	public $table = "friends";

	public static $factory = array(
		'user_id' => 'factory|Models\User',
		'friend_id' => 'factory|Models\User'
	);

	public function user()
	{
		return $this->belongsTo('Models\User');
	}

	public function friend()
	{
		return $this->belongsTo('Models\User', 'friend_id');
	}
}