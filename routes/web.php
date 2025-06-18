<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        // Jika peran adalah 'admin', arahkan ke dashboard panel admin Filament.
        return redirect()->route('filament.admin.pages.dashboard');
    }
    // Jika peran bukan 'admin' (misal: 'user' biasa), arahkan ke halaman daftar faskes (/faskes)
    return redirect()->route('faskes.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Halaman daftar faskes (di /faskes)
    Route::get('/faskes', [PublicFaskesController::class, 'index'])->name('faskes.index');

    // Fungsionalitas pencarian/filter di halaman daftar faskes
    Route::get('/faskes/search', [PublicFaskesController::class, 'index'])->name('faskes.search');

    // Halaman detail faskes
    Route::get('/faskes/{faskes}', [PublicFaskesController::class, 'show'])->name('faskes.show');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
