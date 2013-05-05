<?php

Route::get('/', 'HomeController@index');
Route::get('login', array('as' => 'login','uses' => 'UsersController@login'));

Route::group(array('before' => 'csrf'), function() {
	Route::post('users', array('as' => 'adduser', 'uses' => 'UsersController@create'));
	Route::post('login', array('uses' => 'UsersController@doLogin'));
});

Route::group(array('before' => 'auth'), function() {
	Route::get('users/find', array('as' => 'findusers', 'uses' => 'UsersController@findUsers'));
	Route::get('users', array('as' => 'userhome','uses' => 'UsersController@index'));
});

Route::group(array('before' => array('auth', 'csrf')), function() {
	Route::post('users/find', array('uses' => 'UsersController@findUsers'));
});