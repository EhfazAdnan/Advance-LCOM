<?php

Route::get('/', 'Frontend\PagesController@index')->name('index');
Route::get('/contact', 'Frontend\PagesController@contact')->name('contact');

Route::group(['prefix' => 'products'], function(){
    Route::get('/', 'Frontend\ProductsController@index')->name('products');
    Route::get('/{slug}', 'Frontend\ProductsController@show')->name('products.show');
    Route::get('/new/search', 'Frontend\PagesController@search')->name('search');

    // Categories show
    Route::get('/categories', 'Frontend\CategoriesController@index')->name('categories.index');
    Route::get('/category/{id}', 'Frontend\CategoriesController@show')->name('categories.show');
});

//user routes
Route::group(['prefix' => 'user'], function(){
Route::get('/token/{token}', 'Frontend\VerificationController@verify')->name('user.verification');
Route::get('/dashboard', 'Frontend\UsersController@dashboard')->name('user.dashboard');
Route::get('/profile', 'Frontend\UsersController@profile')->name('user.profile');
Route::post('/profile/update', 'Frontend\UsersController@profileUpdate')->name('user.profile.update');
});

//carts routes
Route::group(['prefix' => 'carts'], function(){
    Route::get('/','Frontend\CartsController@index')->name('carts');
    Route::post('/store','Frontend\CartsController@store')->name('carts.store');
});

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'Backend\PagesController@index')->name('admin.index');

    // Products routes
    Route::group(['prefix' => '/products'], function(){
        Route::get('/', 'Backend\ProductsController@index')->name('admin.products');
        Route::get('/create', 'Backend\ProductsController@create')->name('admin.product.create');
        Route::get('/edit/{id}', 'Backend\ProductsController@edit')->name('admin.product.edit');
        Route::post('/store', 'Backend\ProductsController@store')->name('admin.product.store');
        Route::post('/edit/{id}', 'Backend\ProductsController@update')->name('admin.product.update');
        Route::post('/delete/{id}', 'Backend\ProductsController@delete')->name('admin.product.delete');
    });

    // Category routes
    Route::group(['prefix' => '/categories'], function(){
        Route::get('/', 'Backend\CategoriesController@index')->name('admin.categories');
        Route::get('/create', 'Backend\CategoriesController@create')->name('admin.category.create');
        Route::get('/edit/{id}', 'Backend\CategoriesController@edit')->name('admin.category.edit');
        Route::post('/store', 'Backend\CategoriesController@store')->name('admin.category.store');
        Route::post('/edit/{id}', 'Backend\CategoriesController@update')->name('admin.category.update');
        Route::post('/delete/{id}', 'Backend\CategoriesController@delete')->name('admin.category.delete');
    });

    // Brand routes
    Route::group(['prefix' => '/brands'], function(){
        Route::get('/', 'Backend\BrandsController@index')->name('admin.brands');
        Route::get('/create', 'Backend\BrandsController@create')->name('admin.brand.create');
        Route::get('/edit/{id}', 'Backend\BrandsController@edit')->name('admin.brand.edit');
        Route::post('/store', 'Backend\BrandsController@store')->name('admin.brand.store');
        Route::post('/edit/{id}', 'Backend\BrandsController@update')->name('admin.brand.update');
        Route::post('/delete/{id}', 'Backend\BrandsController@delete')->name('admin.brand.delete');
    });

    // Division routes
    Route::group(['prefix' => '/divisions'], function(){
        Route::get('/', 'Backend\DivisionsController@index')->name('admin.divisions');
        Route::get('/create', 'Backend\DivisionsController@create')->name('admin.division.create');
        Route::get('/edit/{id}', 'Backend\DivisionsController@edit')->name('admin.division.edit');
        Route::post('/store', 'Backend\DivisionsController@store')->name('admin.division.store');
        Route::post('/edit/{id}', 'Backend\DivisionsController@update')->name('admin.division.update');
        Route::post('/delete/{id}', 'Backend\DivisionsController@delete')->name('admin.division.delete');
    });

    // District routes
    Route::group(['prefix' => '/districts'], function(){
        Route::get('/', 'Backend\DistrictsController@index')->name('admin.districts');
        Route::get('/create', 'Backend\DistrictsController@create')->name('admin.district.create');
        Route::get('/edit/{id}', 'Backend\DistrictsController@edit')->name('admin.district.edit');
        Route::post('/store', 'Backend\DistrictsController@store')->name('admin.district.store');
        Route::post('/edit/{id}', 'Backend\DistrictsController@update')->name('admin.district.update');
        Route::post('/delete/{id}', 'Backend\DistrictsController@delete')->name('admin.district.delete');
    });

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
