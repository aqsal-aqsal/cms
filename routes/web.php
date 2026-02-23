<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(function ($request, $next) {
    if (! auth()->check()) {
        return redirect()->route('login');
    }

    return $next($request);
})->group(function () {
    Route::middleware(function ($request, $next) {
        if (! auth()->user() || auth()->user()->role?->name !== 'admin') {
            abort(403);
        }

        return $next($request);
    })->prefix('admin')->as('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('posts', PostController::class)->except(['show']);
        Route::resource('categories', CategoryController::class)->except(['show']);

        Route::get('users', [AdminUserController::class, 'index'])->name('users.index');
        Route::put('users/{user}', [AdminUserController::class, 'update'])->name('users.update');
    });
});
