<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');

Route::middleware('auth')->group(function () {
    Route::get('/arsip', [ArchiveController::class, 'index'])->name('arsip.index');
    Route::get('/tambah-arsip', [ArchiveController::class, 'create'])->name('arsip.create');
    Route::post('/tambah-arsip', [ArchiveController::class, 'store'])->name('arsip.store');
    Route::delete('/arsip/{id}', [ArchiveController::class, 'destroy'])->name('arsip.destroy');
    Route::get('/arsip-{id_surat}-download', [ArchiveController::class, 'download'])->name('arsip.download');
    Route::get('arsip-{id_surat}-view', [ArchiveController::class, 'viewPdf'])->name('arsip.viewPdf');
    Route::get('/arsip-{id_surat}-edit', [ArchiveController::class, 'edit'])->name('arsip.edit');
    Route::put('/arsip/{id_surat}', [ArchiveController::class, 'update'])->name('arsip.update');


    
    Route::get('/kategori', [CategoryController::class, 'index'])->name('kategori.index');
    Route::get('/kategori-tambah', [CategoryController::class, 'create'])->name('kategori.create');
    Route::post('/kategori-tambah', [CategoryController::class, 'store'])->name('kategori.store');
    Route::delete('/kategori/{id_kategori}', [CategoryController::class, 'destroy'])->name('kategori.destroy');
    Route::get('kategori-edit-{id_kategori}', [CategoryController::class, 'edit'])->name('kategori.edit');
    Route::put('kategori-update-{id_kategori}', [CategoryController::class, 'update'])->name('kategori.update');


    Route::get('/about', [AboutController::class, 'index'])->name('about.index');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

