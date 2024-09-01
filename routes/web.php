<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Cashflow;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/cashflow', [Cashflow::class, 'index'])->middleware(['auth', 'verified'])->name('cashflow.index');
Route::get('/cashflow/create', [Cashflow::class, 'create'])->middleware(['auth', 'verified'])->name('cashflow.create');
Route::post('/cashflow/store', [Cashflow::class, 'store'])->middleware(['auth', 'verified'])->name('cashflow.store');
Route::get('/cashflow/search', [Cashflow::class, 'search'])->middleware(['auth', 'verified'])->name('cashflow.search');

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
