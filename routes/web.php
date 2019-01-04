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

Route::group(['middleware' => 'auth'], function() {
    
    Route::get('/merk/data', 'MerkController@listData')->name('merk.data');
    Route::resource('/merk', 'MerkController');
    
    Route::get('/servisan/data', 'ServisanController@listData')->name('servisan.data');
    Route::resource('/servisan', 'ServisanController');
    Route::get('/servisan/{servisan}/notapdf', 'ServisanController@notaPDF')->name('nota.pdf');
    
    Route::get('/garansi/data', 'GaransiController@listData')->name('garansi.data');
    Route::get('/garansi', 'GaransiController@index')->name('garansi.index');
    Route::get('/garansi/create', 'GaransiController@create')->name('garansi.create');
    Route::post('/garansi/create', 'GaransiController@store')->name('garansi.store');
    Route::get('/garansi/{garansi}/edit', 'GaransiController@edit')->name('garansi.edit');
    Route::patch('/garansi/{garansi}', 'GaransiController@update')->name('garansi.update');
    Route::delete('/garansi/{garansi}', 'GaransiController@destroy')->name('garansi.destroy');
    Route::get('/garansi/{garansi}/notapdf', 'GaransiController@notaPDF')->name('nota.pdf');
    

    Route::get('/laporan', 'LaporanController@index')->name('laporan.index');
    Route::get('laporan/data/{month}/{year}', 'LaporanController@listData')->name('laporan.data'); 
    Route::post('/laporan', 'LaporanController@refresh')->name('laporan.refresh');
    Route::get('laporan/pdf/{month}/{year}', 'LaporanController@exportPDF');
    Route::get('/laporan/{servisan}/create', 'LaporanController@create')->name('laporan.create');
    Route::post('/laporan/{servisan}/create', 'LaporanController@store')->name('laporan.store');
    Route::get('/laporan/{servisan}/track', 'LaporanController@track')->name('laporan.track');
    Route::post('/laporan/{servisan}/track', 'LaporanController@commit')->name('laporan.commit');
    Route::get('/laporan/{laporan}/edit', 'LaporanController@edit')->name('laporan.edit');
    Route::patch('/laporan/{laporan}', 'LaporanController@update')->name('laporan.update'); 
    Route::delete('/laporan/{servisan}', 'LaporanController@destroy')->name('laporan.destroy');

    Route::get('sparepart/data', 'SparepartController@listData')->name('sparepart.data');
    Route::resource('/sparepart', 'SparepartController');
});