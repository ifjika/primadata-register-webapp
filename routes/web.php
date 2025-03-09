<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return view('admin.dashboard');
    } elseif (auth()->check() && auth()->user()->role === 'user') {
        return view('user.dashboard');
    }
    return redirect('/'); // Redirect if the user does not have a valid role
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/check-role', function (UserController $userController) {
    if ($userController->isAdmin()) {
        return response()->json(['role' => 'admin']);
    } elseif ($userController->isUser()) {
        return response()->json(['role' => 'user']);
    }
    return response()->json(['role' => 'guest']);
})->middleware(['auth']);

require __DIR__ . '/auth.php';
