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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth', 'check.active']], function() {
    Route::resource('user', 'UsersController')->only([
        'index', 'create', 'store', 'show'
    ]);

    Route::get('reset-password', 'UsersController@resetPassword')->name('resetPassword');

    Route::resource('storehouse', 'StoreHousesController')->only([
        'index', 'create', 'store', 'update', 'edit', 'show'
    ]);

    Route::resource('products', 'ProductsController')->only([
        'index', 'create', 'store', 'update', 'edit'
    ]);

    Route::resource('history-stores', 'HistoryStoresController')->only([
        'index', 'show'
    ]);

    Route::get('import-product-view', 'ProductsController@viewImportProduct')->name('viewImportProduct');

    Route::post('import-product', 'ProductsController@importProduct')->name('importProduct');

    Route::get('export-product-view', 'ProductsController@viewExportProduct')->name('viewExportProduct');

    Route::post('export-product', 'ProductsController@exportProduct')->name('exportProduct');

    Route::get('list-storehouses', 'StoreHousesController@listStore')->name('listStorehouses');

    Route::get('export', 'ExportController@export')->name('export');

    Route::get('ajaxEditProduct', 'ProductsController@editByAjax');

});
Route::resource('change-password', 'ChangePassWord')->only([
        'index', 'update'
])->middleware('auth');

