<?php

use App\Http\Controllers\ContentPageController;
use App\Http\Controllers\SocialMediaLinkController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Authors
Route::view('/authors', [Controller::class, 'authors']);
Route::view('/author/{author}', [Controller::class, 'authorPages']);

// Content Pages
Route::resource('content', ContentPageController::class)->name('*', 'content');
Route::post('/content/{id}/togglePublish', [ContentPageController::class, 'togglePublish'])->name('content.togglePublish');

// Social Media & Links
Route::resource('social', SocialMediaLinkController::class)->name('*', 'social');

// Backend
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
