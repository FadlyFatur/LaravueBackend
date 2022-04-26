<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGaleryController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/auth.php';

Route::get('/', [dashboardController::class, 'index'])->name('dashboard');
Route::get('product/galeri/{id}', [ProductGaleryController::class, 'galeries'])->name('product.galery');
Route::get('trasaction/{id}/set-status', [TransactionController::class, 'setStatus'])->name('transaction.status');

Route::resource('product', ProductController::class);
Route::resource('galeri', ProductGaleryController::class);
Route::resource('transaction', TransactionController::class);


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
