<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BerkasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/home', function () {
    return view('dashboard');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/admin', function () {
    if (!auth()->check() || auth()->user()->role !== 'admin') {
        return redirect()->route('home')->with('error', 'You are not authorized.');
    }

    return view('admin.dashboard');
})->middleware('auth')->name('admin');

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('berkas', [BerkasController::class, 'index'])->name('berkas.index');
    Route::get('berkas/create', [BerkasController::class, 'create'])->name('berkas.create');
    Route::post('berkas', [BerkasController::class, 'store'])->name('berkas.store');
    Route::get('berkas/{id}', [BerkasController::class, 'show'])->name('berkas.show');
    Route::get('berkas/{id}/edit', [BerkasController::class, 'edit'])->name('berkas.edit');
    Route::put('berkas/{id}', [BerkasController::class, 'update'])->name('berkas.update');
    Route::delete('berkas/{id}', [BerkasController::class, 'destroy'])->name('berkas.destroy');
});

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('peserta', [PesertaController::class, 'index'])->name('peserta.index');
    Route::get('peserta/create', [PesertaController::class, 'create'])->name('peserta.create');
    Route::post('peserta', [PesertaController::class, 'store'])->name('peserta.store');
    Route::get('peserta/{id}', [PesertaController::class, 'show'])->name('peserta.show');
    Route::get('peserta/{id}/edit', [PesertaController::class, 'edit'])->name('peserta.edit');
    Route::put('peserta/{id}', [PesertaController::class, 'update'])->name('peserta.update');
    Route::delete('peserta/{id}', [PesertaController::class, 'destroy'])->name('peserta.destroy');
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
