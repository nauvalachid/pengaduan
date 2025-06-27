<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Dosen Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('dosen', DosenController::class);
});

// Mahasiswa Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('mahasiswa', MahasiswaController::class);
});

// Pengaduan Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('pengaduan', PengaduanController::class);

// Route tambahan untuk like dan dislike pengaduan
    Route::post('/pengaduan/{id}/like', [PengaduanController::class, 'like'])->name('pengaduan.like');
    Route::post('/pengaduan/{id}/dislike', [PengaduanController::class, 'dislike'])->name('pengaduan.dislike');
});

// Tanggapan Routes
Route::middleware(['auth'])->group(function () {
    // kustom create & store untuk tanggapan yang memerlukan pengaduanId
    Route::get('/tanggapan/create/{pengaduanId}', [TanggapanController::class, 'create'])->name('tanggapan.create');
    Route::post('/tanggapan/store/{pengaduanId}', [TanggapanController::class, 'store'])->name('tanggapan.store');

    // resource routes lainnya
    Route::get('/tanggapan', [TanggapanController::class, 'index'])->name('tanggapan.index');
    Route::get('/tanggapan/{id}', [TanggapanController::class, 'show'])->name('tanggapan.show');
    Route::get('/tanggapan/{id}/edit', [TanggapanController::class, 'edit'])->name('tanggapan.edit');
    Route::put('/tanggapan/{id}', [TanggapanController::class, 'update'])->name('tanggapan.update');
    Route::delete('/tanggapan/{id}', [TanggapanController::class, 'destroy'])->name('tanggapan.destroy');
});

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
