<?php

Auth::routes();

Route::get('/', 'PostController@index')->name('home'); // atm, it duplicates the posts.index

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('posts', 'PostController');
