<?php

use Illuminate\Http\Request;


Route::post('auth/register', [
	'uses' => 'AuthController@register']);
	
Route::post('auth/login', [
	'uses' => 'AuthController@login']);

// Route::group(['middleware' => 'jwt.auth'], function(){
//   Route::get('auth/user', 'AuthController@user');
// });

// Route::group(['middleware' => 'jwt.refresh'], function(){
//   Route::get('auth/refresh', 'AuthController@refresh');
// });