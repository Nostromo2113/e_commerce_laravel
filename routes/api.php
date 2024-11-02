<?php

use App\Http\Controllers\Admin\Order\OrderProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {
    Route::group(['prefix' => 'categories', 'namespace' => 'Category'], function () {
        Route::get('/', 'IndexController');
        Route::get('/create', 'CreateController');
        Route::post('/', 'StoreController');
        Route::get('/{category}/edit', 'EditController');
        Route::get('/{category}', 'ShowController');
        Route::patch('/{category}', 'UpdateController');
        Route::delete('/{category}', 'DestroyController');
    });
    Route::group(['prefix' => 'genres', 'namespace' => 'genre'], function () {
        Route::get('/', 'IndexController');
        Route::get('/create', 'CreateController');
        Route::post('/', 'StoreController');
        Route::get('/{genre}/edit', 'EditController');
        Route::get('/{genre}', 'ShowController');
        Route::patch('/{genre}', 'UpdateController');
        Route::delete('/{genre}', 'DestroyController');
    });
    Route::group(['prefix' => 'users', 'namespace' => 'User'], function () {
        Route::get('/', 'IndexController');
        Route::get('/create', 'CreateController');
        Route::post('/', 'StoreController');
        Route::get('/{user}/edit', 'EditController');
        Route::get('/{user}', 'ShowController');
        Route::patch('/{user}', 'UpdateController');
        Route::delete('/{user}', 'DestroyController');
    });

    Route::group(['prefix' => 'requirements', 'namespace' => 'TechnicalRequirement'], function () {
        Route::get('/', 'IndexController');
        Route::get('/create', 'CreateController');
        Route::post('/', 'StoreController');
        Route::get('/{requirement}/edit', 'EditController');
        Route::get('/{requirement}', 'ShowController');
        Route::patch('/{requirement}', 'UpdateController');
        Route::delete('/{requirement}', 'DestroyController');
    });

    Route::group(['prefix' => 'products', 'namespace' => 'Product'], function () {
        Route::get('/', 'IndexController');
//            Route::get('/create', 'CreateController');
        Route::post('/', 'StoreController');
//            Route::get('/{product}/edit', 'EditController');
        Route::get('/{product}', 'ShowController');
        Route::patch('/{product}', 'UpdateController');
        Route::delete('/{product}', 'DestroyController');
    });
    Route::group(['prefix' => 'orders', 'namespace' => 'Order'], function () {
        Route::get('/', 'IndexController');
//        Route::get('/create', 'CreateController');
      Route::post('/', 'StoreController');
//        Route::get('/{order}/edit', 'EditController');
        Route::get('/{order}', 'ShowController');
        Route::patch('/{order}', 'UpdateController');
//        Route::delete('/{order}', 'DestroyController');
    });


    Route::group(['prefix' => 'comments', 'namespace' => 'Comment'], function () {
        Route::get('/', 'IndexController');
        Route::get('/create', 'CreateController');
        Route::post('/', 'StoreController');
        Route::get('/{comment}/edit', 'EditController');
        Route::get('/{comment}', 'ShowController');
        Route::patch('/{comment}', 'UpdateController');
        Route::delete('/{comment}', 'DestroyController');
    });
});
