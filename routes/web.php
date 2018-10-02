<?php

Route::get('/',[
	'uses' => 'homeController@index',
	'as'   => 'home.index'
]);
<<<<<<< HEAD
=======
//ــــــــــــــــــــــــــــــــــــــــــــــــBackEnd_________________________________

>>>>>>> 888e1c0dfa0ed95ffd37ced857bda0f4ae3bf8fd
Route::get('well',[
	'uses' => 'homeController@well',
	'as'   => 'home.index'
]);
//______________StartAdmin_______________________________
Route::get('/admin',[
	"uses" =>'adminsController@login',
	"as"   =>'admins.login'
]);
Route::match(['get', 'post'],'/admin/dashboard',[
	"uses" =>'adminsController@dashboard',
	"as"   =>'admins.dashboard',
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

Route::get('/admin/category/add',[
	"uses" =>'CategoryController@add',
	]); 

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
//______________startmanufacture___________________________
Route::get('/admin/manufacture/add','ManuFacturesController@add');
Route::post('/admin/manufacture/save','ManuFacturesController@save');
Route::get('/admin/manufacture/all','ManuFacturesController@all');
Route::get('/admin/manufacture/{id}/delete','ManuFacturesController@delete');	
Route::get('/admin/manufacture/{id}/active','ManuFacturesController@active');
Route::get('/admin/manufacture/{id}/unactive','ManuFacturesController@unactive');
Route::get('/admin/manufacture/{id}/update','ManuFacturesController@update');
Route::post('/admin/manufacture/{id}/update/done','ManuFacturesController@update_done');          
//______________Endmanufacture___________________________
//______________Startproduct___________________________
Route::get('/admin/product/add','ProductController@add');
Route::post('/admin/product/save','ProductController@save');
Route::get('/admin/product/all','ProductController@all');
Route::get('/admin/product/{id}/unactive','ProductController@unactive');
Route::get('/admin/product/{id}/active','ProductController@active');
Route::get('/admin/product/{id}/delete','ProductController@delete');
//______________Endproduct___________________________
//______________Startslider___________________________
Route::get('/admin/slider/add','SliderController@add');
Route::get('/admin/slider/all','SliderController@all');
Route::post('/admin/slider/save','SliderController@save');
Route::get('/admin/slider/{slider_id}/active','SliderController@active');
Route::get('/admin/slider/{slider_id}/unactive','SliderController@unactive');
Route::get('/admin/slider/{slider_id}/delete','SliderController@delete');
<<<<<<< HEAD
//______________Endslider___________________________
Route::get('/category/{id}/{category_name}', 'HomeController@displayCategoryProducts');
Route::get('/brand/{id}/{manufacture_name}', 'HomeController@displayManufactureProducts');
Route::get('/product/{id}/{product_name}', 'HomeController@displayProductDetails');
Route::post('/cart/add', 'CartController@add');
Route::get('/cart', 'CartController@cart');
Route::get('/cart/delete/item/{id}','CartController@delete');
Route::get('/cart/{id}/increment','CartController@increment');
Route::get('/cart/{id}/decrement','CartController@decrement');
//______________checkout & Login___________________________
Route::get('/cart/checkout', 'CartController@checkout');
Route::get('/customer/auth', 'CustomerController@auth');
Route::post('/customer/register', 'CustomerController@register');
Route::post('/customer/login', 'CustomerController@login');
Route::get('/customer/logout', 'CustomerController@logout');
//______________Endcheckout & Login___________________________
//______________Shipping___________________________
Route::post('/cart/shipping/save', 'CartController@save_shipping');
Route::get('/cart/payment', 'CartController@payment');
Route::post('/cart/payment/do', 'CartController@do_payment');
Route::get('/payment/zarinpal/callback', 'CartController@zarinpalCallback')->name('payment.zarinpal.callback');
Route::get('/cart/success', 'CartController@success');
Route::post('/search/keyword/', 'SearchController@keyword');
Route::get('/wishlist/all', 'WishlistController@all');
Route::get('/wishlist/add/{customer_id}/product/id/{product_id}', 'WishlistController@add');
Route::get('/wishlist/remove/{wishlist_id}', 'WishlistController@remove');
Route::post('/cart/payment/do', 'CartController@do_payment');
Route::get('/payment/zarinpal/callback', 'CartController@zarinpalCallback')->name('payment.zarinpal.callback');
Route::get('/cart/success', 'CartController@success');
//______________EndShipping__________________________
=======
//______________Endslider___________________________
>>>>>>> 888e1c0dfa0ed95ffd37ced857bda0f4ae3bf8fd
