<?php

Route::post('/login', 'api\V1\Seller\LoginController@login');

Route::group(['prefix' => 'v1/public', 'as' => 'api.', 'namespace' => 'Api\V1\Visitors'], function () {
    // Atestats
    Route::apiResource('producatori', 'AtestatApiController');
    
    // Products
    Route::apiResource('produse', 'ProductApiController');
    
    // Categories
    Route::apiResource('categori', 'CategoryApiController');

    // Subcategories
    Route::apiResource('subcategori', 'SubcategoryApiController');
});

Route::group(['prefix' => 'v1/user', 'as' => 'api.', 'namespace' => 'Api\V1\Seller', 'middleware' => ['auth:api']], function () {
    // Atestats
    Route::post('atestats/media', 'AtestatApiController@storeMedia')->name('atestats.storeMedia');
    Route::apiResource('atestats', 'AtestatApiController');
    
    // Products
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController');
});

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Atestats
    Route::post('atestats/media', 'AtestatApiController@storeMedia')->name('atestats.storeMedia');
    Route::apiResource('atestats', 'AtestatApiController');

    // Regions
    Route::apiResource('regions', 'RegionApiController', ['except' => ['store']]);

    // Places
    Route::apiResource('places', 'PlaceApiController', ['except' => ['store']]);

    // Categories
    Route::apiResource('categories', 'CategoryApiController');

    // Subcategories
    Route::apiResource('subcategories', 'SubcategoryApiController');

    // Products
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController');
});