<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return redirect ('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

// barang
Route::get('/barang', 'ProductController@view');
Route::get('/barang/create', 'ProductController@create');
Route::post('/barang', 'ProductController@store');
Route::get('/barang/{id}/edit', 'ProductController@edit');
Route::put('/barang/{id}', 'ProductController@update');
Route::get('/barang/{id}/delete', 'ProductController@delete');

// kategori
Route::get('/kategori', 'CategoryController@view');
Route::get('/kategori/create', 'CategoryController@create');
Route::post('/kategori', 'CategoryController@store');
Route::get('/kategori/{id}/edit', 'CategoryController@edit');
Route::put('/kategori/{id}', 'CategoryController@update');
Route::get('/kategori/{id}/delete', 'CategoryController@delete');

// Unit
Route::get('/unit', 'UnitController@view');
Route::get('/unit/create', 'UnitController@create');
Route::post('/unit', 'UnitController@store');
Route::get('/unit/{id}/edit', 'UnitController@edit');
Route::put('/unit/{id}', 'UnitController@update');
Route::get('/unit/{id}/delete', 'UnitController@delete');


// supplier
Route::get('/supplier', 'SupplierController@view');
Route::get('/supplier/create', 'SupplierController@create');
Route::post('/supplier', 'SupplierController@store');
Route::get('/supplier/{id}/edit', 'SupplierController@edit');
Route::put('/supplier/{id}', 'SupplierController@update');
Route::get('/supplier/{id}/delete', 'SupplierController@delete');

// outlet
Route::get('/outlet', 'OutletController@view');
Route::get('/outlet/create', 'OutletController@create');
Route::post('/outlet', 'OutletController@store');
Route::get('/outlet/{id}/edit', 'OutletController@edit');
Route::put('/outlet/{id}', 'OutletController@update');
Route::get('/outlet/{id}/delete', 'OutletController@delete');


// barang masuk
Route::get('/barangmasuk', 'ProductInController@view');
Route::get('/barangmasuk/create', 'ProductInController@create');
Route::post('/barangmasuk', 'ProductInController@store');
//barang masuk detail
Route::get('/transaksi-in/{number}', 'ProductInDetailController@create');
Route::get('/transaksi-in/{number}/delete', 'ProductInController@delete');
Route::get('/transaksimasuk/{number}', 'ProductInDetailController@getdata');
Route::post('/transaksimasuk/add', 'ProductInDetailController@add');
Route::get('/transaksimasuk/{id}/delete', 'ProductInDetailController@delete');
Route::get('/transaksimasuk/{id}/edit', 'ProductInDetailController@edit');
Route::get('/transaksimasuk/{number}/simpan', 'ProductInDetailController@simpan');

// barang keluar
Route::get('/barangkeluar', 'ProductOutController@view');
Route::get('/barangkeluar/create', 'ProductOutController@create');
Route::post('/barangkeluar', 'ProductOutController@store');
//barang keluar detail
Route::get('/transaksi-out/{number}', 'ProductOutDetailController@create');
Route::get('/transaksi-out/{number}/delete', 'ProductOutController@delete');
Route::get('/transaksikeluar/{number}', 'ProductOutDetailController@getdata');
Route::post('/transaksikeluar/add', 'ProductOutDetailController@add');
Route::get('/transaksikeluar/{id}/delete', 'ProductOutDetailController@delete');
Route::get('/transaksikeluar/{id}/edit', 'ProductOutDetailController@edit');
Route::get('/transaksikeluar/{number}/simpan', 'ProductOutDetailController@simpan');


// barang rusak
Route::get('/barangrusak', 'ProductReturController@index');
Route::get('/barangrusak/view', 'ProductReturController@view');
Route::get('/barangrusak/create', 'ProductReturController@create');
Route::post('/barangrusak', 'ProductReturController@store');
//barang rusak detail
Route::get('/transaksi-retur/{number}', 'ProductReturDetailController@create');
Route::get('/transaksi-retur/{number}/delete', 'ProductReturController@delete');
Route::get('/transaksirusak/{number}', 'ProductReturDetailController@getdata');
Route::post('/transaksirusak/add', 'ProductReturDetailController@add');
Route::get('/transaksirusak/{id}/delete', 'ProductReturDetailController@delete');
Route::get('/transaksirusak/{id}/edit', 'ProductReturDetailController@edit');
Route::get('/transaksirusak/{number}/simpan', 'ProductReturDetailController@simpan');


// untuk print
Route::get('/printtransaksikeluar/{number}', 'ProductOutController@previewtransaksi');
Route::get('/printtransaksimasuk/{number}', 'ProductInController@previewtransaksi');
Route::get('/printtransaksiretur/{number}', 'ProductReturController@previewtransaksi');
// untuk print


// laporan
Route::get('/reportbarangmasuk', function(){
	$tree = '<span class="glyphicon glyphicon-menu-right"></span> Laporan <span class="glyphicon glyphicon-menu-right"></span> Barang Masuk';
	return view('report.reportproductin', compact('tree'));
});
Route::post('/reportbarangmasuk', 'ProductInController@report');

Route::get('/reportbarangkeluar', function(){
	$tree = '<span class="glyphicon glyphicon-menu-right"></span> Laporan <span class="glyphicon glyphicon-menu-right"></span> Barang Keluar';
	return view('report.reportproductout', compact('tree'));
});
Route::post('/reportbarangkeluar', 'ProductOutController@report');

Route::get('/reportbarangrusak', function(){
	$tree = '<span class="glyphicon glyphicon-menu-right"></span> Laporan <span class="glyphicon glyphicon-menu-right"></span> Barang Rusak';
	return view('report.reportproductcrash', compact('tree'));
});
Route::post('/reportbarangrusak', 'ProductReturController@report');


// user
Route::get('/user', 'UserController@index');
Route::get('/user/create', 'UserController@create');
Route::post('/user/register', 'UserController@store');
Route::get('/user/profile', 'UserController@profile');
Route::post('/user/updateprofile', 'UserController@update_profile');
Route::get('/user/password', 'UserController@password');
Route::post('/user/changepassword', 'UserController@change_password');
Route::get('/logout', 'UserController@logout');












