<?php

Route::get('/', function(){
    redirect('/login');
});
// $this->encrypt->encode($msg);
Route::auth(FALSE);
Route::get('/homepage', 'DashboardController@index',['middleware' => ['SimpleAuthMiddleware']])->name('homepage');
Route::group('master',['namespace' => 'master','middleware' => ['SimpleAuthMiddleware']],function(){
	Route::get('customer','CustomerController@index')->name('master.customer');
	Route::get('customer/{id}/'.hash("gost", 'delete'),'CustomerController@delete')->name('master.customer.delete');
	Route::match(['GET', 'POST'],'customer/'.hash("gost", 'create'),'CustomerController@create')->name('master.customer.create');
	Route::match(['GET', 'POST'],'customer/{id}/'.hash("gost", 'edit'),'CustomerController@edit')->name('master.customer.edit');
	Route::get(hash("sha256", 'customers'),'CustomerController@customersGrid')->name('master.grid.customer');
	Route::group('courier', function(){
		Route::get('/','CourierController@index')->name('master.courier');
		Route::get('{id}/'.hash("gost", 'delete'),'CourierController@delete')->name('master.courier.delete');
		Route::match(['GET', 'POST'],'/'.hash("gost", 'create'),'CourierController@create')->name('master.courier.create');
		Route::match(['GET', 'POST'],'/{id}/'.hash("gost", 'edit'),'CourierController@edit')->name('master.courier.edit');
		Route::get(hash("sha256", 'couriercourier'),'CourierController@grid')->name('courier.grid');
	});
	Route::group('product', function(){
		Route::get('/','ProductController@index')->name('product');
		Route::get('{id}/'.hash("gost", 'delete'),'ProductController@delete')->name('product.delete');
		Route::match(['GET', 'POST'],'/'.hash("gost", 'create'),'ProductController@create')->name('product.create');
		Route::match(['GET', 'POST'],'/{id}/'.hash("gost", 'edit'),'ProductController@edit')->name('product.edit');
		Route::get(hash("sha256", 'product'),'ProductController@grid')->name('product.grid');
	});
});

Route::group('transaction',['namespace' => 'transaction','middleware' => ['SimpleAuthMiddleware']],function(){
	Route::group('order', function()
	{
		Route::get('/','OrderController@index')->name('order');
		Route::match(['GET', 'POST'],'/'.hash("gost", 'create'),'OrderController@create')->name('order.create');
		Route::match(['GET', 'POST'],'/{id}/'.hash("gost", 'edit'),'OrderController@edit')->name('order.take');
		Route::get(hash("sha256", 'datatables'),'OrderController@grid')->name('order.grid');
	});

});

Route::set('404_override', function(){
    show_404();
});
Route::set('translate_uri_dashes',FALSE);
