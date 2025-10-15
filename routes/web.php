<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/divine-green', function () {
    return Inertia::render('DivineGreen');
})->name('divine.green');
Route::get('/about-us', function () {
    return Inertia::render('About');
})->name('about');

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');

Route::get('/pb-arcade', function () {
    return Inertia::render('PBArcade');
})->name('p.b.arcade');

Route::get('/sky-link-heights', function () {
    return Inertia::render('SkyLinkHeight');
})->name('sky.link.heights');

Route::get('/horo-gauri', function () {
    return Inertia::render('HoroGauri');
})->name('horo.gauri');

Route::get('/shivashree', function () {
    return Inertia::render('Shivashree');
})->name('shivashree.apartment');

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
