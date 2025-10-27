<?php

/*
|--------------------------------------------------------------------------
| School Admin Routes (Protected)
|--------------------------------------------------------------------------
|
| These routes are restricted to authenticated, verified, and admin users.
|
*/

use App\Http\Controllers\Admin\AdminMediaController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {

        // Dashboard page
        Route::get('/', function () {
            return Inertia::render('Admin/Dashboard');
        })->name('dashboard');
        // Dashboard page
        // Route::get('/media', function () {
        //     return Inertia::render('Admin/PageMediaManager');   
        // })->name('admin.media');

        Route::get('/media', [AdminMediaController::class, 'index']);
        Route::get('/media/create', [AdminMediaController::class, 'create']);
        Route::post('/media/store', [AdminMediaController::class, 'store']);
    });

});