<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Models\Post;

// Welcome page
Route::get('/', [PagesController::class, 'welcome'])->name('welcome');

// About page
Route::get('/about', [PagesController::class, 'about'])->name('about');

// Services page
Route::get('/service', [PagesController::class, 'service'])->name('service');

// Posts resource routes
Route::resource('posts', PostController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // API Token Management Routes
Route::post('/profile/create-token', [ProfileController::class, 'createToken'])->name('profile.create-token');
Route::delete('/profile/delete-token/{id}', [ProfileController::class, 'deleteToken'])->name('profile.delete-token');


    // Notification routes
    Route::get('/notifications', function () {
        // Get all unread notifications for the authenticated user
        $unreadNotifications = Auth::user()->unreadNotifications;
        // Get all notifications (read and unread)
        $allNotifications = Auth::user()->notifications;

        return view('notifications.index', compact('unreadNotifications', 'allNotifications'));
    })->name('notifications.index');

    Route::post('/notifications/{id}/mark-as-read', function ($id) {
        Auth::user()->notifications()->where('id', $id)->first()->markAsRead();
        return back()->with('success', 'Notification marked as read.');
    })->name('notifications.markAsRead');

    // You might add a route to mark all as read
    Route::post('/notifications/mark-all-as-read', function () {
        Auth::user()->unreadNotifications->markAsRead();
        return back()->with('success', 'All notifications marked as read.');
    })->name('notifications.markAllAsRead');

});

require __DIR__.'/auth.php';
