<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AuthDriverController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\WalletController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::controller(AuthDriverController::class)->prefix('auth/driver')->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::controller(SettingController::class)->prefix('payment')->group(function () {
    Route::get('/', 'payment');
    Route::get('/show/{id}', 'showPayment');
});

Route::controller(SettingController::class)->prefix('coupons')->group(function () {
    Route::get('/', 'coupons');
    Route::get('/show/{id}', 'showCoupons');
});

Route::controller(SettingController::class)->prefix('setting')->group(function () {
    Route::get('/', 'setting');
});


Route::controller(ProductController::class)->prefix('product')->group(function () {
    Route::get('/', 'index');
    Route::get('/show/{id}', 'show');
});

Route::controller(ServiceController::class)->prefix('services')->group(function () {
    Route::get('/', 'index');
    Route::get('/show/{id}', 'show');
});


Route::middleware(['auth:api'])->group(function () {

    Route::prefix('wallets')->group(function () {
        Route::get('/', [WalletController::class, 'index']);
    });

    Route::prefix('favorites')->group(function () {
        Route::get('/', [FavoriteController::class, 'index']);
        Route::post('/store', [FavoriteController::class, 'store']);
        Route::post('/delete', [FavoriteController::class, 'delete']);
    });

    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index']);
        Route::post('/store', [OrderController::class, 'store']);

        Route::prefix('driver')->group(function (){
            Route::post('assign',[OrderController::class,'assign']);
            Route::post('update',[OrderController::class,'update']);
        });
    });





});

