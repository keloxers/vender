<?php

// Authentication routes...
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');



Route::get('/', 'ArticulosController@home');

Route::resource('articulos', 'ArticulosController');
Route::get('/articulos/{url}/deleteimage', 'ArticulosController@deleteimage');

Route::get('/c/{url}', 'ArticulosController@showcaterogia');

Route::get('/perfil', 'PerfilController@edit');
Route::post('/perfil/{id}', 'PerfilController@update');

Route::post('/buscar', 'ArticulosController@buscar');

Route::get('/videoayuda', 'PerfilController@ayuda');

Route::get('/{user}', 'PerfilController@showuser');
