<?php

Route::get('/', 'HomeController@index');
Route::get('users', array(
	'before' => 'auth',
	'as' => 'userhome',
	'uses' => 'UsersController@index'
));

Route::post('users', array(
	'before' => 'csrf',
	'as' => 'adduser',
	'uses' => 'UsersController@create'
));