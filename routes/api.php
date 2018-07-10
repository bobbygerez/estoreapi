<?php

Route::post('login', 'Auth\LoginController@login');

Route::group(['prefix' => 'auth', 'middleware' => 'jwt.auth'], function () {
    Route::get('user', 'API\User\UserController@user');
    Route::post('logout', 'Auth\LoginController@logout');
});

Route::get('menu-categories', 'API\Menu\MenuController@categories');
