<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\LaporanKeuanganController;
use App\Http\Controllers\LaporanPesertaController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PendaftaranPesertaController;
use App\Http\Controllers\PendaftaranPaketController;

use App\Models\Paket;


Route::get('/', function () {
    return view('dashboard');
});

Route::get('/home', function () {
    return view('dashboard');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Route Admin
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

// Route Pendaftaran Peserta
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('pendaftaran', [PendaftaranPesertaController::class, 'index'])->name('pendaftaran.index');
    Route::get('pendaftaran/create', [PendaftaranPesertaController::class, 'create'])->name('pendaftaran.create');
    Route::post('pendaftaran', [PendaftaranPesertaController::class, 'store'])->name('pendaftaran.store');
    // Route::get('peserta/{id}', [PendaftaranPesertaController::class, 'show'])->name('peserta.show');
    Route::get('pendaftaran/{id}/edit', [PendaftaranPesertaController::class, 'edit'])->name('pendaftaran.edit');
    Route::put('pendaftaran/{id}', [PendaftaranPesertaController::class, 'update'])->name('pendaftaran.update');
    Route::delete('pendaftaran/{id}', [PendaftaranPesertaController::class, 'destroy'])->name('pendaftaran.destroy');
});


// Route Pendaftaran Paket
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    // Route::get('pendaftaran', [PendaftaranPaketController::class, 'index'])->name('pendaftaran.index');
    Route::get('pendaftaran/paket/create', [PendaftaranPaketController::class, 'create'])->name('pendaftaran.paket.create');
    Route::post('pendaftaran/paket', [PendaftaranPaketController::class, 'store'])->name('pendaftaran.paket.store');
    // Route::get('pendaftaran/{id}', [PendaftaranPaketController::class, 'show'])->name('pendaftaran.show');
    Route::get('pendaftaran/paket/{id}/edit', [PendaftaranPaketController::class, 'edit'])->name('pendaftaran.paket.edit');
    Route::put('pendaftaran/paket/{id}', [PendaftaranPaketController::class, 'update'])->name('pendaftaran.paket.update');
    // Route::delete('pendaftaran/{id}', [PendaftaranPaketController::class, 'destroy'])->name('pendaftaran.destroy');
});


// Route Pembayaran
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('pembayaran/create', [PembayaranController::class, 'create'])->name('pembayaran.create');
    Route::post('pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');
    Route::get('pembayaran/{id}', [PembayaranController::class, 'show'])->name('pembayaran.show');
    Route::get('pembayaran/{id}/edit', [PembayaranController::class, 'edit'])->name('pembayaran.edit');
    Route::put('pembayaran/{id}', [PembayaranController::class, 'update'])->name('pembayaran.update');
    Route::delete('pembayaran/{id}', [PembayaranController::class, 'destroy'])->name('pembayaran.destroy');
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


// Route Laporan Keuangan
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('laporan/keuangan', [LaporanKeuanganController::class, 'index'])->name('laporan.keuangan.index');
    Route::get('laporan/keuangan/create', [LaporanKeuanganController::class, 'create'])->name('laporan.keuangan.create');
    Route::post('laporan/keuangan', [LaporanKeuanganController::class, 'store'])->name('laporan.keuangan.store');
    Route::get('laporan/keuangan/{id}', [LaporanKeuanganController::class, 'show'])->name('laporan.keuangan.show');
    // Route::get('laporan/keuangan/{id}/edit', [LaporanKeuanganController::class, 'edit'])->name('laporan.keuangan.edit');
    Route::put('laporan/keuangan/{id}', [LaporanKeuanganController::class, 'update'])->name('laporan.keuangan.update');
    Route::delete('laporan/keuangan/{id}', [LaporanKeuanganController::class, 'destroy'])->name('laporan.keuangan.destroy');
    Route::get('laporan/keuangan/{id}/cetak-pdf', [LaporanKeuanganController::class, 'cetak'])->name('laporan.keuangan.cetak');
});


// Route Laporan Peserta
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('laporan/peserta', [LaporanPesertaController::class, 'index'])->name('laporan.peserta.index');
    Route::get('laporan/peserta/create', [LaporanPesertaController::class, 'create'])->name('laporan.peserta.create');
    Route::post('laporan/peserta', [LaporanPesertaController::class, 'store'])->name('laporan.peserta.store');
    Route::get('laporan/peserta/{id}', [LaporanPesertaController::class, 'show'])->name('laporan.peserta.show');
    // Route::get('laporan/peserta/{id}/edit', [LaporanPesertaController::class, 'edit'])->name('laporan.peserta.edit');
    Route::put('laporan/peserta/{id}', [LaporanPesertaController::class, 'update'])->name('laporan.peserta.update');
    Route::delete('laporan/peserta/{id}', [LaporanPesertaController::class, 'destroy'])->name('laporan.peserta.destroy');
    Route::get('laporan/peserta/{id}/cetak-pdf', [LaporanPesertaController::class, 'cetak'])->name('laporan.peserta.cetak');
});


Route::get('/leader', function () {
    if (!auth()->check() || auth()->user()->role !== 'leader') {
        return redirect()->route('home')->with('error', 'You are not authorized.');
    }

    return view('leader.dashboard');
})->middleware('auth')->name('leader.dashboard');


// Route Laporan Keuangan dan Peserta oleh Leader
Route::middleware(['auth', 'role:leader'])->prefix('leader')->name('leader.')->group(function () {
    // Laporan Keuangan (read only + cetak)
    Route::get('laporan/keuangan', [LaporanKeuanganController::class, 'index'])->name('laporan.keuangan.index');
    Route::get('laporan/keuangan/{id}', [LaporanKeuanganController::class, 'show'])->name('laporan.keuangan.show');
    Route::get('laporan/keuangan/{id}/cetak-pdf', [LaporanKeuanganController::class, 'cetak'])->name('laporan.keuangan.cetak');

    // Laporan Peserta (read only + cetak)
    Route::get('laporan/peserta', [LaporanPesertaController::class, 'index'])->name('laporan.peserta.index');
    Route::get('laporan/peserta/{id}', [LaporanPesertaController::class, 'show'])->name('laporan.peserta.show');
    Route::get('laporan/peserta/{id}/cetak-pdf', [LaporanPesertaController::class, 'cetak'])->name('laporan.peserta.cetak');
});

Route::middleware('auth')->group(function () {
    // Laporan Keuangan Redirect
    Route::get('/laporan/keuangan', function () {
        $role = auth()->user()->role;
        return redirect("/$role/laporan/keuangan");
    })->name('laporan.keuangan.redirect');

    // Laporan Peserta Redirect
    Route::get('/laporan/peserta', function () {
        $role = auth()->user()->role;
        return redirect("/$role/laporan/peserta");
    })->name('laporan.peserta.redirect');
});


Route::get('/details', function () {
    return view('details');
})->name('details');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/check-role', function (UserController $userController) {
    if ($userController->isAdmin()) {
        return response()->json(['role' => 'admin']);
    } elseif ($userController->isLeader()) {
        return response()->json(['role' => 'leader']);
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
    $paket = Paket::all();
    return view('courses', compact('paket'));
})->name('courses');

Route::get('/class-1', function () {
    return view('class-1');
})->name('class-1');

Route::get('/class-2', function () {
    return view('class-2');
})->name('class-2');

require __DIR__ . '/auth.php';
