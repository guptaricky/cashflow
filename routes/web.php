<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Cashflow;
use App\Http\Controllers\customerController;
use App\Http\Controllers\productController;
use App\Http\Controllers\currencyController;
use App\Http\Controllers\companyController;
use App\Http\Controllers\conversionFactor;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/cashflow', [Cashflow::class, 'index'])->middleware(['auth', 'verified'])->name('cashflow.index');
Route::get('/cashflow/cashflow-detail-view/{id}', [Cashflow::class, 'detail'])->middleware(['auth', 'verified'])->name('cashflow.detail');
Route::get('/cashflow/createold', [Cashflow::class, 'create'])->middleware(['auth', 'verified'])->name('cashflow.createold');
Route::get('/cashflow/create', [Cashflow::class, 'create'])->middleware(['auth', 'verified'])->name('cashflow.create');
Route::post('/cashflow/store', [Cashflow::class, 'store'])->middleware(['auth', 'verified'])->name('cashflow.store');
Route::get('/cashflow/search', [Cashflow::class, 'search'])->middleware(['auth', 'verified'])->name('cashflow.search');
Route::get('/cashflow/export', [Cashflow::class, 'export'])->middleware(['auth', 'verified'])->name('cashflow.export');
Route::get('/cashflow/exportXero', [Cashflow::class, 'exportXero'])->middleware(['auth', 'verified'])->name('cashflow.exportXero');

Route::get('/customer/create', [customerController::class, 'create'])->middleware(['auth', 'verified'])->name('customer.create');
Route::post('/customer/store', [customerController::class, 'store'])->middleware(['auth', 'verified'])->name('customer.store');
Route::post('/customer/{id}/updateActive', [customerController::class, 'updateActive']);


Route::get('/product/create', [productController::class, 'create'])->middleware(['auth', 'verified'])->name('product.create');
Route::post('/product/store', [productController::class, 'store'])->middleware(['auth', 'verified'])->name('product.store');
Route::post('/product/{id}/updateActive', [productController::class, 'updateActive']);

Route::get('/cashflow/currency', [currencyController::class, 'create'])->middleware(['auth', 'verified'])->name('currency.create');
Route::post('/currency/store', [currencyController::class, 'store'])->middleware(['auth', 'verified'])->name('currency.store');
Route::post('/currency/{id}/setDefault', [CurrencyController::class, 'setDefault']);
Route::post('/currency/{id}/updateActive', [CurrencyController::class, 'updateActive']);

Route::get('/cashflow/company', [companyController::class, 'create'])->middleware(['auth', 'verified'])->name('company.create');
Route::post('/company/store', [companyController::class, 'store'])->middleware(['auth', 'verified'])->name('company.store');
Route::post('/company/{id}/updateActive', [companyController::class, 'updateActive']);

Route::get('/cashflow/conversion', [conversionFactor::class, 'create'])->middleware(['auth', 'verified'])->name('conversion.create');
Route::post('/conversionFactor/store', [conversionFactor::class, 'store'])->middleware(['auth', 'verified'])->name('conversionFactor.store');
Route::get('/conversion/getConversion/{currency}', [conversionFactor::class, 'getConversion']);


Route::get('/cashflow-list-view', function () {
    return view('cashflowList');
})->middleware(['auth', 'verified'])->name('cashflow-list-view');

Route::get('/company', function () {
    return view('company');
})->middleware(['auth', 'verified'])->name('company');

Route::get('/currency', function () {
    return view('currency');
})->middleware(['auth', 'verified'])->name('currency');

Route::get('/setting', function () {
    return view('setting');
})->middleware(['auth', 'verified'])->name('setting');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
