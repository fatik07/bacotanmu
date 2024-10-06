<?php

use App\Http\Controllers\CurhatController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(CurhatController::class)->group(function () {
    Route::get('', 'index')->name('curhat.index');
    Route::get('/curhat-baru', 'create')->name('curhat-baru.create');
    Route::post('/curhat-baru', 'store')->name('curhat-baru.store');
    Route::get('/curhat-detail/{id}', 'show')->name('curhat-detail.show');
    Route::get('/curhat-semua', 'showAll')->name('curhat-baru.show-all');
    Route::get('/load-more-curhats', [CurhatController::class, 'loadMore'])->name('curhats.loadMore');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
