<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\DietPlanController;
use App\Http\Controllers\LiveSessionController;
use Illuminate\Support\Facades\Route;

// Public Pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/programs', [PageController::class, 'programs'])->name('public.programs');
Route::get('/trainers', [PageController::class, 'trainers'])->name('public.trainers');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Dashboard Routing
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Auth Routes (Profile & Modules)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Enroll in a program
    Route::post('/programs/{program}/enroll', [ProgramController::class, 'enroll'])->name('programs.enroll');

    // Modules
    Route::prefix('manage')->group(function () {
        Route::resource('programs', ProgramController::class);
        Route::resource('workouts', WorkoutController::class);
        Route::resource('diet-plans', DietPlanController::class);
        Route::resource('live-sessions', LiveSessionController::class);
    });
});

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('users.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\StoreController;

Route::get('/store', [StoreController::class, 'index'])->name('store.index');
Route::post('/store/cart/add/{product}', [StoreController::class, 'addToCart'])->name('store.add');
Route::get('/store/cart', [StoreController::class, 'cart'])->name('store.cart');
Route::post('/store/cart/update', [StoreController::class, 'updateCart'])->name('store.cart.update');
Route::post('/store/cart/remove', [StoreController::class, 'removeFromCart'])->name('store.cart.remove');

Route::middleware(['auth'])->prefix('manage')->name('admin.')->group(function () {
    Route::resource('products', AdminProductController::class);
});

