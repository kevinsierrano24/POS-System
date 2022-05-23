<?php

// Route::get('/', function(){
//   return view('welcome');
// });

Auth::routes();
Route::any('register', function(){
	return abort(404);
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
//=========================================================================
Route::group(['middleware'=>'auth'], function(){
	Route::resource('employee', 'EmployeeController');
	Route::get('/employee/{id_karyawan}/show', 'EmployeeController@show');
	//=========================================================================
	Route::resource('product', 'ProductController');
	Route::get('/product/{id_produk}/show', 'ProductController@show');
	//=========================================================================
	Route::get('/sell', 'SellController@index')->name('sell.index');
	Route::post('/sell', 'SellController@store')->name('sell.store');
	Route::get('/sell/update', 'SellController@update')->name('sell.update');
	Route::delete('/sell/{id_sell}', 'SellController@destroy');
	Route::get('/sell/laporan', 'SellController@report')->name('sell.report');
	//=========================================================================
	Route::resource('/report', 'ReportController');
	//=========================================================================
	Route::get('/suratjalan', 'PurchaseController@index')->name('suratjalan.index');
	Route::resource('purchase', 'PurchaseController');
	Route::get('/purchase/show', 'PurchaseController@show')->name('purchase.show');
	
	
	
	Route::post('/purchase/store', 'PurchaseController@store')->name('purchase.store');
	Route::get('/purchase/update', 'PurchaseController@update')->name('purchase.update');
	Route::get('/purchase/{no_po}/delete', 'PurchaseController@destroy')->name('purchase.delete');
	Route::get('/purchase/{no_po}/print', 'PurchaseController@report')->name('purchase.report');
	//=========================================================================
	Route::resource('/report2', 'Report2Controller');
	Route::post('/report2/store', 'Report2Controller@store')->name('report.store');
	Route::post('/report2/show', 'Report2Controller@show')->name('report.show');
	Route::get('/report2/{no_po}/edit', 'Report2Controller@edit')->name('report2.edit');
	Route::get('/report2/{no_po}/delete', 'Report2Controller@destroy')->name('report2.delete');
	Route::get('/report2/{no_po}/print', 'Report2Controller@report')->name('report2.report');


	Route::get('/unit/{id_unit}/delete', 'UnitController@destroy')->name('unit.delete');
	Route::get('/product/{id_produk}/delete', 'ProductController@destroy')->name('product.delete');
	Route::get('/user/{name}/delete', 'UserController@destroy')->name('user.delete');
	Route::get('/supplier/{id_supplier}/delete', 'SupplierController@destroy')->name('supplier.delete');
	Route::get('/toko/{id_toko}/delete', 'TokoController@destroy')->name('toko.delete');
	
	//=========================================================================
	// Route::resource('schedule', 'ScheduleController');
	// Route::get('/schedule/{id_jadwal}/show', 'ScheduleController@show');
	// Route::get('/schedule', 'ScheduleController@index')->name('schedule.index');
	// Route::get('/schedule/create', 'ScheduleController@create')->name('schedule.create');
	// Route::post('/schedule', 'ScheduleController@store');
	// Route::get('/schedule/{id_jadwal}/edit', 'ScheduleController@edit');
	// Route::put('/schedule/{id_jadwal}', 'ScheduleController@update');
	// Route::delete('/schedule/{id_jadwal}', 'ScheduleController@destroy');
	//=========================================================================
	Route::resource('supplier', 'SupplierController');
	Route::get('/supplier', 'SupplierController@index')->name('supplier.index');
	Route::get('/supplier/{id_supplier}/show', 'SupplierController@show');
	//=========================================================================
	Route::resource('toko', 'TokoController');
	Route::get('/toko', 'TokoController@index')->name('toko.index');
	Route::get('/toko/{kode_toko}/edit', 'TokoController@edit')->name('toko.edit');
	Route::get('/toko/{id_supplier}/show', 'TokoController@show');
	//=========================================================================
	Route::get('/setting', 'UserSettingController@form')->name('user.setting');
	Route::post('/setting', 'UserSettingController@update');
	//=========================================================================
	Route::group(['middleware'=>'akses.admin'], function(){
		Route::resource('category', 'CategoryController');
		Route::resource('unit', 'UnitController');
		Route::resource('user', 'UserController');
	});
	// Route::get('/user', 'UserController@index')->name('user.index')->middleware('akses.admin');
	//=========================================================================

	Route::get('/about', function(){
		return view('gudang.about');
	});
});
