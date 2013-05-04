<?php

Route::get('/', 'HomeController@index');
Route::get('users', array(
	'before' => 'auth',
	'as' => 'userhome',
	'uses' => 'UsersController@index'
));
Route::get('login', array(
	'as' => 'login',
	'uses' => 'UsersController@login'
));

Route::post('users', array(
	'before' => 'csrf',
	'as' => 'adduser',
	'uses' => 'UsersController@create'
));
Route::post('login', array(
	'before' => 'csrf',
	'uses' => 'UsersController@doLogin'
));