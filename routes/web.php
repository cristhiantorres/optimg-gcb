<?php
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('optimizar', 'OptmizarController@optimizar');
Route::get('getcodebar','OptmizarController@getCodeBar')->name('getcodebar');
Route::get('excel','ExcelController@index')->name('excel');
Route::post('excel','ExcelController@store')->name('excel.store');
