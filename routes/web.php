<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PendaftaranController;

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

// Route  Berkas
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('berkas', [BerkasController::class, 'index'])->name('berkas.index');
    Route::get('berkas/create', [BerkasController::class, 'create'])->name('berkas.create');
    Route::post('berkas', [BerkasController::class, 'store'])->name('berkas.store');
    Route::get('berkas/{id}', [BerkasController::class, 'show'])->name('berkas.show');
    Route::get('berkas/{id}/edit', [BerkasController::class, 'edit'])->name('berkas.edit');
    Route::put('berkas/{id}', [BerkasController::class, 'update'])->name('berkas.update');
    Route::delete('berkas/{id}', [BerkasController::class, 'destroy'])->name('berkas.destroy');
});

// Route Peserta
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('peserta', [PesertaController::class, 'index'])->name('peserta.index');
    Route::get('peserta/create', [PesertaController::class, 'create'])->name('peserta.create');
    Route::post('peserta', [PesertaController::class, 'store'])->name('peserta.store');
    Route::get('peserta/{id}', [PesertaController::class, 'show'])->name('peserta.show');
    Route::get('peserta/{id}/edit', [PesertaController::class, 'edit'])->name('peserta.edit');
    Route::put('peserta/{id}', [PesertaController::class, 'update'])->name('peserta.update');
    Route::delete('peserta/{id}', [PesertaController::class, 'destroy'])->name('peserta.destroy');
});

// Route Pendaftaran
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
    Route::get('pendaftaran/create', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
    Route::post('pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
    Route::get('pendaftaran/{id}', [PendaftaranController::class, 'show'])->name('pendaftaran.show');
    Route::get('pendaftaran/{id}/edit', [PendaftaranController::class, 'edit'])->name('pendaftaran.edit');
    Route::put('pendaftaran/{id}', [PendaftaranController::class, 'update'])->name('pendaftaran.update');
    Route::delete('pendaftaran/{id}', [PendaftaranController::class, 'destroy'])->name('pendaftaran.destroy');
});


// Route Paket
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('paket', [PaketController::class, 'index'])->name('paket.index');
    Route::get('paket/create', [PaketController::class, 'create'])->name('paket.create');
    Route::post('paket', [PaketController::class, 'store'])->name('paket.store');
    Route::get('paket/{id}', [PaketController::class, 'show'])->name('paket.show');
    Route::get('paket/{id}/edit', [PaketController::class, 'edit'])->name('paket.edit');
    Route::put('paket/{id}', [PaketController::class, 'update'])->name('paket.update');
    Route::delete('paket/{id}', [PaketController::class, 'destroy'])->name('paket.destroy');
});


// Route Laporan
use App\Http\Controllers\LaporanController;

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
    Route::post('laporan', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('laporan/{id}', [LaporanController::class, 'show'])->name('laporan.show');
    Route::get('laporan/{id}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
    Route::put('laporan/{id}', [LaporanController::class, 'update'])->name('laporan.update');
    Route::delete('laporan/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');
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
