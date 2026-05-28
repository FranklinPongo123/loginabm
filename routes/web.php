<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', fn() => redirect()->route('login'));

Route::get('/login',   [AuthController::class, 'showLogin'])->name('login');
Route::post('/login',  [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/',                  [AdminController::class, 'index'])->name('dashboard');
    Route::get('/users/create',      [AdminController::class, 'create'])->name('users.create');
    Route::post('/users',            [AdminController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit',   [AdminController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}',        [AdminController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}',     [AdminController::class, 'destroy'])->name('users.destroy');
});

Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
});