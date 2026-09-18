<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('landing');
// });


Route::view('/', 'Web.landing')->name('home');

Route::view('/about', 'Web.pages.about')->name('about');
Route::view('/header', 'Web.components.header')->name('about');

Route::view('/activities', 'Web.pages.activities')->name('activities');

Route::view('/events', 'Web.pages.events')->name('events');

Route::view('/gallery', 'Web.pages.gallery')->name('gallery');

Route::view('/contact', 'Web.pages.contact')->name('contact');
Route::get('/join', function () {
    return view('Web.pages.join');
})->name('join');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/notifications/{notification}/read', [NotificationController::class, 'read'])->name('notifications.read');
    Route::post('/notifications/read-all', [NotificationController::class, 'readAll'])->name('notifications.read-all');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
