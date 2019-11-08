<?php

Route::get('/', 'PagesController@index')->name('index');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/products', 'PagesController@products')->name('products');


Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'AdminPagesController@index')->name('admin.index');

    Route::group(['prefix' => '/products'], function(){
        Route::get('/', 'AdminProductController@index')->name('admin.products');
        Route::get('/create', 'AdminProductController@create')->name('admin.product.create');
        Route::get('/edit/{id}', 'AdminProductController@edit')->name('admin.product.edit');
        Route::post('/store', 'AdminProductController@store')->name('admin.product.store');
        Route::post('/edit/{id}', 'AdminProductController@update')->name('admin.product.update');
        Route::post('/delete/{id}', 'AdminProductController@delete')->name('admin.product.delete');
    });

});