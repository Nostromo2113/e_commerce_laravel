<?php

use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['verify' => true]); //возможен неверный импорт
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::get('/home', function() {
    return view('verification');
});
//Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');


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
