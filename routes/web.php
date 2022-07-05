<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'DashboardController@landing');
Route::get('/', 'DashboardController@landing')->name('dashboard');
Route::get('/about', 'DashboardController@about')->name('about');
Route::get('/ajax-city', 'DashboardController@searchCity')->name('search-city');
Route::post('/get-price', 'DashboardController@getPrice')->name('get-price');
Route::get('/tracking', 'DashboardController@tracking')->name('tracking');

Route::middleware(['web'])->group(function () {
	Auth::routes();
});


Route::get('/home', 'HomeController@index')->name('home');
// Route::get('logout', 'HomeController@logout')->name('logout');

Route::get('/file_download/{filename}', 'FilePaymentController@downloadfile')->name("download_file");
Route::group([
	'prefix' => 'cms',
	'middleware' => 'auth'
],function() {
	Route::get('/','DashboardController@index');

	// Manage Content

	// Master
	Route::group([
		'as' => 'master.',
		'prefix' => 'master',
		'namespace' => 'Master'
	], function() {
		// Route::resource('user', 'UserController', ['except' => ['show'] ]);
		Route::resource('store', 'StoreController');
		Route::resource('karyawan', 'KaryawanController');
		Route::resource('kategori', 'KategoriController');
		Route::resource('barang', 'BarangController');
		Route::resource('stockdata', 'StockDataController');

		// Route::resource('customer', 'CustomerController', ['except' => 'show']);
	});

	// TRX
	Route::group([
		'as' => 'trx.',
		'prefix' => 'trx',
		'namespace' => 'Trx'
	], function() {

		// Route::get(
		// 		'appliance-check-download-pdf/{applianceCheckId}',
		// 		'ApplianceCheckController@download'
		// 		)->name('appliance-check-download-pdf');

		// Route::get(
		// 		'performance-download-pdf',
		// 		'PerformanceController@download'
		// 		)->name('performance-download-pdf');

		Route::get(
			'stock-in-download-pdf/{id}',
			'StockInController@download'
			)->name('stock-in-download-pdf');

		Route::get(
			'stock-in-akumulasi',
			'StockInController@akumulasi'
			)->name('stock-in-akumulasi');

		Route::get(
			'transfer-barang-download-pdf/{id}',
			'TransferBarangController@download'
			)->name('transfer-barang-download-pdf');

		Route::get(
			'transfer-barang-akumulasi',
			'TransferBarangController@akumulasi'
			)->name('transfer-barang-akumulasi');

		Route::resource('stock-in', 'StockInController');
		Route::resource('stock-in-detail', 'StockInDetailController');
		Route::resource('transfer-barang', 'TransferBarangController');
		Route::resource('transfer-barang-detail', 'TransferBarangDetailController');
	});
});

