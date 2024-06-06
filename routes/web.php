<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboard', App\Livewire\Dashboard::class)->name('dashboard');
    Route::get('players', App\Livewire\Player::class)->name('players');
});


Route::get('logout', [\Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class, 'destroy']);
