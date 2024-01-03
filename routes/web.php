<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('setting', [AdminController::class, 'setting'])->name('setting');
    Route::post('/updateSettings',[AdminController::class,'updateSettings'])->name('updateSettings');

});


