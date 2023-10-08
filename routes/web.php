<?php

use App\Http\Controllers\CategoryController;
use App\Models\Category;
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

// Route::view('/', 'welcome');

Route::view('/', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::controller(\App\Http\Controllers\FruitCategoryController::class)
    ->prefix('fruit-categories')
    ->name('fruit_categories.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
    });

Route::controller(\App\Http\Controllers\FruitItemController::class)
    ->prefix('fruit-items')
    ->name('fruit_items.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
    });


Route::prefix('purchase-invoices')
    ->name('purchase_invoices.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', App\Livewire\PurchaseInvoices\Index::class)->name('index');
        Route::get('/create', \App\Livewire\PurchaseInvoices\Create::class)->name('create');
        Route::get('{purchase:slug}/edit', \App\Livewire\PurchaseInvoices\Edit::class)->name('edit');
        Route::get('{purchase:slug}/print', \App\Http\Controllers\PurchaseController::class)->name('print');
        Route::get('{purchase:slug}', \App\Livewire\PurchaseInvoices\Show::class)->name('show');
    });

require __DIR__ . '/auth.php';
