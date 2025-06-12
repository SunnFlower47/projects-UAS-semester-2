<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile/photo', [ProfileController::class, 'destroyPhoto'])->name('profile.photo.delete');

    Route::get('/perpustakaan', [PerpustakaanController::class, 'index'])->name('perpustakaan.index');
    Route::get('/search', [PerpustakaanController::class, 'search'])->name('books.search');
    Route::get('/books/{book}', [BookController::class, 'show'])->name('perpustakaan.books.show');

    Route::get('/pinjaman/create/{book}', [PinjamanController::class, 'create'])->name('perpustakaan.pinjaman.create');
    Route::post('/pinjaman/store', [PinjamanController::class, 'store'])->name('perpustakaan.pinjaman.store');
    Route::get('/pinjaman/bukti/{id}', [PinjamanController::class, 'bukti'])->name('perpustakaan.pinjaman.bukti-pinjaman');
    Route::get('/pinjaman/{id}/download-pdf', [PinjamanController::class, 'downloadPDF'])->name('perpustakaan.pinjaman.download-pdf');
    Route::get('/histori-pinjaman', [PinjamanController::class, 'histori'])->name('perpustakaan.pinjaman.histori-pinjaman');
    Route::get('/histori/search', [PinjamanController::class, 'searchHistori'])->name('histori.search');



});

require __DIR__.'/auth.php';
