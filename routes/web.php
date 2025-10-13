<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/about-us', function () {
    return Inertia::render('About');
})->name('about');

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');

Route::get('/devine-green', function () {
    return Inertia::render('DevineGreen');
})->name('devine.green');

Route::get('/sky-link-high', function () {
    return Inertia::render('SkyLinkHigh');
})->name('sky.link.high');

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');

Route::get('/flat-in-jorhat', function () {
    return Inertia::render('seo/Jorhat');
})->name('seo.jorhat.flat');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
