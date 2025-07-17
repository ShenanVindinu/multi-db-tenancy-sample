<?php

use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// The dashboard route pointing to our new controller
Route::get('/dashboard', [PlaceController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

// All other authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes to handle adding/deleting places
    Route::resource('places', PlaceController::class)->except(['index']);
});

require __DIR__.'/auth.php';
