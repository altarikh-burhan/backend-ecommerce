<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;

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

Route::get('/', function(){
    return view('auth/login');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){
    
    Route::name('dashboard.')->prefix('dashboard')->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        Route::resource('product', ProductController::class);
        Route::resource('category', ProductCategoryController::class);
        Route::resource('product.gallery', ProductGalleryController::class)->shallow()->only([
            'index', 'create', 'store', 'destroy'
        ]);

        Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');
        Route::get('/transaction/{transaction}', [TransactionController::class, 'show'])->name('transaction.show');
        Route::get('/transaction/{transaction}/print', [TransactionController::class, 'print'])->name('transaction.print');
        Route::get('/transaction/{transaction}/edit', [TransactionController::class, 'edit'])->name('transaction.edit');
        Route::put('/transaction/{transaction}', [TransactionController::class, 'update'])->name('transaction.update');
        
        Route::get('/report', [ReportController::class, 'index'])->name('report.index');
        Route::get('/report/transaction', [ReportController::class, 'transactionReport'])->name('report.transaction');

        Route::resource('user', UserController::class)->only([
            'index', 'edit', 'update', 'destroy'
        ]);
        
       

    });
       
});
