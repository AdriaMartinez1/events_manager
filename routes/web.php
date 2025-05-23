<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('users',UserController::class);
Route::post('/register/{event}/{user}',  [RegisterController::class,'addRegistry'] )->name('register.addRegistry');
Route::post('/unregister/{event}/{user}',  [RegisterController::class,'removeRegistry'] )->name('unregister.removeRegistry');
Route::resource('events',EventController::class);
Route::resource('categories',CategoryController::class);
require __DIR__.'/auth.php';
