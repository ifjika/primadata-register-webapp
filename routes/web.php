<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', function () {
    return view('dashboard');
})->name('home');


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/admin', function () {
    if (auth()->check() && auth()->user()->role == 'admin') {
        return view('admin.dashboard');
    }
});

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

Route::get('/instructor', function () {
    return view('instructor');
})->name('instructor');

Route::get('/activity', function () {
    return view('activity');
})->name('activity');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/courses', function () {
    return view('courses');
})->name('courses');


Route::get('/class-1', function () {
    return view('class-1');
})->name('class-1');

Route::get('/class-2', function () {
    return view('class-2');
})->name('class-2');

require __DIR__ . '/auth.php';
