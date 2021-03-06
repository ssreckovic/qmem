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

Route::get('/', function() {
	return redirect('dashboard');
})->name('buffer')->middleware('auth');

Route::get('dashboard', 'DashboardController@index')
	->name('dashboard');

Route::prefix('barcodes')
	->name('barcodes.')
	->group(function () {

	Route::get('', 'BarcodeController@index')->name('index');
	Route::post('generate', 'BarcodeController@generate')->name('generate');
});

Route::prefix('export')
	->name('export.')
	->group(function () {

	Route::get('', 'ExportController@index')->name('index');
	Route::post('download', 'ExportController@download')->name('download');
});

Route::prefix('search')
	->name('search.')
	->group(function () {

	Route::get('', 'SearchController@index')->name('index');
});

Route::prefix('assets')
	->name('assets.')
	->group(function () {

	Route::get('', 'AssetController@index')->name('index');
	// no POST view for listing
	
	Route::get('new', 'AssetController@new')->name('new');
	Route::post('create', 'AssetController@create')->name('create');

	Route::get('{id}', 'AssetController@view')->name('view');
	
	Route::get('{id}/edit', 'AssetController@edit')->name('edit');
	Route::post('{id}/update', 'AssetController@update')->name('update');

	Route::get('{id}/delete', 'AssetController@delete')->name('delete');
	Route::post('{id}/destroy', 'AssetController@destroy')->name('destroy');
});

Route::prefix('categories')
	->name('categories.')
	->group(function () {

	Route::get('', 'CategoryController@index')->name('index');
	// no POST view for listing
	
	Route::get('new', 'CategoryController@new')->name('new');
	Route::post('create', 'CategoryController@create')->name('create');

	Route::get('{id}', 'CategoryController@view')->name('view');
	
	Route::get('{id}/edit', 'CategoryController@edit')->name('edit');
	Route::post('{id}/update', 'CategoryController@update')->name('update');

	Route::get('{id}/delete', 'CategoryController@delete')->name('delete');
	Route::post('{id}/destroy', 'CategoryController@destroy')->name('destroy');
});

Route::prefix('consumables')
	->name('consumables.')
	->group(function () {

	Route::get('', 'ConsumableController@index')->name('index');
	// no POST view for listing

	Route::get('new', 'ConsumableController@new')->name('new');
	Route::post('create', 'ConsumableController@create')->name('create');
	
	Route::get('{id}', 'ConsumableController@view')->name('view');
	
	Route::get('{id}/edit', 'ConsumableController@edit')->name('edit');
	Route::post('{id}/update', 'ConsumableController@update')->name('update');

	Route::get('{id}/delete', 'ConsumableController@delete')->name('delete');
	Route::post('{id}/destroy', 'ConsumableController@destroy')->name('destroy');
});

Route::prefix('reports')
	->name('reports.')
	->group(function () {
	Route::get('', 'ReportsController@index')->name('index');

	Route::post('create', 'ReportsController@create')->name('create');
	
	Route::post('download', 'ReportsController@download')->name('download');

});

Route::prefix('user')
	->name('user.')
	->group(function () {
	Route::get('profile', 'CurrentUserController@profile')->name('profile');
	Route::get('logout', 'CurrentUserController@logout')->name('logout');
});

Route::prefix('users')
	->name('users.')
	->group(function () {

	Route::get('', 'UserController@index')->name('index');

	Route::get('new', 'UserController@new')->name('new');
	Route::post('create', 'UserController@create')->name('create');

	Route::get('{netid}', 'UserController@view')->name('view');

	Route::get('{netid}/edit', 'UserController@edit')->name('edit');
	Route::post('{netid}/update', 'UserController@update')->name('update');

	Route::get('{netid}/delete', 'UserController@delete')->name('delete');
	Route::post('{netid}/destroy', 'UserController@destroy')->name('destroy');
});