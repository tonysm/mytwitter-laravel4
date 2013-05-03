<?php

App::bind('Repositories\UserRepositoryInterface', 'Repositories\EloquentUserRepository');

Route::get('/', 'HomeController@index');
Route::get('users', 'UsersController@index');

Route::post('users', array('as' => 'adduser', 'uses' => 'UsersController@create'));