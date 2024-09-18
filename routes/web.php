<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function ()
//{
//    Route::group(['prefix' => 'categories', 'namespace' => 'Category'], function () {
//        Route::get('/', 'IndexController');
//        Route::get('/create', 'CreateController');
//        Route::post('/', 'StoreController');
//        Route::get('/{category}/edit', 'EditController');
//        Route::get('/{category}', 'ShowController');
//        Route::patch('/{category}', 'UpdateController');
//        Route::delete('/{category}', 'DestroyController');
//    });
//});
