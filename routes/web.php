<?php


//ــــــــــــــــــــــــــــــــــــــــــــــfrontendــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
Route::get('/',[
	'uses' => 'homeController@index',
	'as'   => 'home.index'
]);
//ــــــــــــــــــــــــــــــــــــــــــــــــBackEnd_________________________________


//______________StartAdmin_______________________________
Route::get('/admin',[
	"uses" =>'adminsController@login',
	"as"   =>'admins.login'

]);
Route::match(['get', 'post'],'/admin/dashboard',[
	"uses" =>'adminsController@dashboard',
	"as"   =>'admins.dashboard',
	"Middelware" => 'admin'

]);

Route::get('/logout',[
	"uses" =>'adminsController@logout',
	"as"   =>'admins.logout'
]);
//_______________EndAdmin________________________________
Route::get('/logout',[
	"uses" =>'adminsController@logout',
	"as"   =>'admins.logout'
]);
//______________Category___________________________

Route::get('/admin/category/add','CategoryController@add'); 
Route::get('/admin/category/all','CategoryController@all_categories');
Route::post('/admi/save_new_category',[
	'uses' => 'CategoryController@save_category',
	'as'   => 'Category.save_category'
]);

Route::get('CategoryActive/{id}',[
	'uses' => 'CategoryController@Active',
	'as'   => 'Category.Active'
]);

Route::get('CategoryDiactive/{id}',[
	'uses' => 'CategoryController@Diactive',
	'as'   => 'Category.Diactive'
]);

Route::get('Categoryedit/{id}',[
	'uses' => 'CategoryController@edit',
	'as'   => 'Category.edit'
]);

Route::get('Categorydelete/{id}',[
	'uses' => 'CategoryController@delete',
	'as'   => 'Category.delete'
]);

Route::post('Categoryupdate/{id}',[
	'uses' => 'CategoryController@update',
	'as'   => 'Category.update'
]);






//______________EndCategory___________________________