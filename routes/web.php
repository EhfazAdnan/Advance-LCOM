<?php

Route::get('/', 'Frontend\PagesController@index')->name('index');
Route::get('/contact', 'Frontend\PagesController@contact')->name('contact');

Route::get('/products', 'Frontend\ProductsController@index')->name('products');
Route::get('/product/{slug}', 'Frontend\ProductsController@show')->name('products.show');


Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'Backend\PagesController@index')->name('admin.index');

    Route::group(['prefix' => '/products'], function(){
        Route::get('/', 'Backend\ProductsController@index')->name('admin.products');
        Route::get('/create', 'Backend\ProductsController@create')->name('admin.product.create');
        Route::get('/edit/{id}', 'Backend\ProductsController@edit')->name('admin.product.edit');
        Route::post('/store', 'Backend\ProductsController@store')->name('admin.product.store');
        Route::post('/edit/{id}', 'Backend\ProductsController@update')->name('admin.product.update');
        Route::post('/delete/{id}', 'Backend\ProductsController@delete')->name('admin.product.delete');
    });

});