<?php

/*
|--------------------------------------------------------------------------
| School Admin Routes (Protected)
|--------------------------------------------------------------------------
|
| These routes are restricted to authenticated, verified, and admin users.
|
*/

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {

        // Dashboard page
        Route::get('/', function () {
            return Inertia::render('Admin/Dashboard');
        })->name('dashboard');
    });
});