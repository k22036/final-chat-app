<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('home'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::post('/user', [HomeController::class, 'user'])->name('user');
    Route::get('/user', function () {
        return redirect(route('error'));
    });
    Route::post('/chat', [ChatController::class, 'chat'])->name('chat');
    Route::get('/chat', function () {
        return redirect(route('error'));
    });
    Route::post('/add-content', [ChatController::class, 'addContent'])->name('add-content');
    Route::get('/add-content', function () {
        return redirect(route('error'));
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/error', function () {
    return view('pages.error');
})->name('error');

require __DIR__ . '/auth.php';
