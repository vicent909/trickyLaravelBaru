<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/products', [HomeController::class, 'api']);
Route::get('/products/{slug}', [DetailController::class, 'api']);