<?php

Route::get('/', 'HomeController@index');

Route::post('users', array('as' => 'adduser', 'uses' => 'UsersController@create'));