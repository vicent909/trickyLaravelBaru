<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/details', [DetailController::class, 'index'])
    ->name('details');

Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout');

Route::get('/checkout/success', [CheckoutController::class, 'success'])
    ->name('checkout-success');


Route::prefix('admin')
    ->namespace('Admin')
    ->group(function(){
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');
    });
