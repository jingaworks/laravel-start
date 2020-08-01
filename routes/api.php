<?php

Route::post('/login', 'api\V1\Admin\LoginController@login');

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