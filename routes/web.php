<?php


//ــــــــــــــــــــــــــــــــــــــــــــــfrontendــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
Route::get('/',[
	'uses' => 'homeController@index',
	'as'   => 'home.index'
]);
//ــــــــــــــــــــــــــــــــــــــــــــــــBackEnd_________________________________

Route::get('/admin',[
	"uses" =>'adminsController@login',
	"as"   =>'admins.login'

]);
Route::match(['get', 'post'],'/admin/dashboard',[
	"uses" =>'adminsController@dashboard',
	"as"   =>'admins.dashboard'

]);

// Route::get('/',[
// 	'uses' => 'adminsController@index',
// 	'as'   => 'admins.index'
// ]);