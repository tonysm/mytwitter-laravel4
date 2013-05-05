<?php
namespace Models;

use LaravelBook\Ardent\Ardent;

class Friend extends Ardent
{
	public $table = "friends";

	public function user() {
		return $this->belongsTo('Models\User');
	}
}