<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Future: Members, Events, News, Gallery, Messages routes yahan aayenge
        // Route::resource('members', MemberController::class);
        // Route::resource('events', EventController::class);
    });
