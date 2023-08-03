<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\VariantController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MidtransController;
use App\Models\Variant;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Attributes\Group;

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

Route::get('/details/{slug}', [DetailController::class, 'index'])
    ->name('details');

Route::post('/checkout', [DetailController::class, 'store'])
    ->name('store_cart');

Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout');

Route::get('/checkout/remove/{id}', [CheckoutController::class, 'remove'])
    ->name('checkout-remove');

Route::get('/checkout/transaction', [CheckoutController::class, 'process'])
    ->name('checkout-process');

Route::get('/checkout/success', [CheckoutController::class, 'success'])
    ->name('checkout-success');

Route::get('/history', [HistoryController::class, 'index'])
    ->name('history')
    ->middleware('auth');
    
Route::get('/history/{id}/done', [HistoryController::class, 'done'])
    ->name('done')
    ->middleware('auth');

Route::prefix('admin')
    // ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/product/{id}/variant', [VariantController::class, 'index'])
            ->name('variant2');

        Route::get('/product/{id}/variant/create', [VariantController::class, 'create'])->name('create_variant');

        Route::resource('product', ProductController::class);
        Route::resource('variant', VariantController::class);
        Route::resource('gallery', GalleryController::class);
        Route::resource('transaction', TransactionController::class);
    });

Auth::routes(['verify' => true]);

// MIDTRANS 
Route::post('/midtrans/callback', [MidtransController::class, 'notificationHandler']);
Route::get('/midtrans/finish', [MidtransController::class, 'finishRedirect']);
Route::get('/midtrans/unfinish', [MidtransController::class, 'unfinishRedirect']);
Route::get('/midtrans/error', [MidtransController::class, 'errorRedirect']);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
