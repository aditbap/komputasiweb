<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ArticleController;

// LANDING PAGE
Route::get('/', [LandingPageController::class, 'index'])->name('welcome');

// USER
Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/create', [AuthController::class, 'create'])->name('auth.create');
});

// ADMIN DASHBOARD
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard.index');

// ADMIN TOKO
Route::get('/toko', [AdminController::class, 'toko'])->name('toko.index');

// ADMIN PRODUK
Route::prefix('produk')->group(function () {
    Route::get('/show', [ProdukController::class, 'show'])->name('produk.show');
    Route::get('/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::get('/list', [ProdukController::class, 'list'])->name('produk.list');
    Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::get('/export', [ProdukController::class, 'export'])->name('produk.export');
});

// ADMIN PESANAN
Route::get('/pesanan/show', [PesananController::class, 'show'])->name('pesanan.show');

// ADMIN ARTICLES
Route::prefix('articles')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('articles.byCategory');
    Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::get('/{id}/delete', [ArticleController::class, 'delete'])->name('articles.delete');
});

Route::get('/pesanan/histori/anjay', [PesananController::class, 'histori'])->name('pesanan.histori');
