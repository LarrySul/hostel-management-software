<?php
	Route::post('auth/register','AuthController@register');
	Route::post('auth/login', 'AuthController@login');
	Route::get('/hostel', 'AuthController@hostel');
	
	Route::get('/home', 'AuthController@home');
	Route::get('/contact', 'AuthController@contact');

	
	Route::get('admin/upload', 'adminController@availableHostel');
	Route::get('admin/views', 'adminController@students');
	Route::get('admin/allocation', 'adminController@allocation');
	Route::get('admin/index', 'adminController@index');
	Route::get('admin/edit&{id}', 'adminController@edit');

	Route::post('admin/update&{id}', 'adminController@update');

	Route::get('admin/deletehostel&{id}', 'adminController@destroy');

	Route::get('admin/delete&{id}', 'AuthController@userDestroy');

	Route::post('/userHostel', 'AuthController@hostelName');



	// add an hostel
	Route::post('/upload','adminController@hostel');

	Route::post('/say','adminController@say');
	Route::get('admin/login', 'adminController@loggedAdmin');

	//end add 
	Route::get('admin/hostel','adminController@addHostel');

	// endpoints
	Route::get('/users', 'AuthController@getUser');
	Route::get('/availables', 'adminController@getHostel');
	Route::get('/students', 'adminController@getStudent');

	

Auth::routes();
