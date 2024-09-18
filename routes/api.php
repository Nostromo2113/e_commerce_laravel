<?php

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
    Route::group(['prefix' => 'tags', 'namespace' => 'Tag'], function () {
        Route::get('/', 'IndexController');
        Route::get('/create', 'CreateController');
        Route::post('/', 'StoreController');
        Route::get('/{tag}/edit', 'EditController');
        Route::get('/{tag}', 'ShowController');
        Route::patch('/{tag}', 'UpdateController');
        Route::delete('/{tag}', 'DestroyController');
    });
    Route::group(['prefix' => 'colors', 'namespace' => 'Color'], function () {
        Route::get('/', 'IndexController');
        Route::get('/create', 'CreateController');
        Route::post('/', 'StoreController');
        Route::get('/{color}/edit', 'EditController');
        Route::get('/{color}', 'ShowController');
        Route::patch('/{color}', 'UpdateController');
        Route::delete('/{color}', 'DestroyController');
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
});
