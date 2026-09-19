<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\ContactController;
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

Route::view('/terms-and-conditions', 'Web.pages.terms')
    ->name('terms');

Route::get('/contact', [ContactController::class, 'index'])
    ->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])
    ->name('contact.submit');

Route::view('/faq', 'Web.pages.faq')
    ->name('faq');

Route::view('/community-guidelines', 'Web.pages.community-guidelines')
    ->name('community.guidelines');

Route::view('/privacy-policy', 'Web.pages.privacy')
    ->name('privacy');

Route::view('/about', 'Web.pages.about')
    ->name('about');

Route::get('/language/{locale}', function ($locale) {

    if (!in_array($locale, ['en', 'hi'])) {
        abort(404);
    }

    session()->put('locale', $locale);

    return redirect()->back();
})->name('language');

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
