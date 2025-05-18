<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Peserta;
use App\Models\Paket;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        // Ambil data pendaftaran beserta relasi peserta dan paket
        $pendaftarans = Pendaftaran::with(['peserta', 'paket'])->get();
        return view('admin.pendaftaran.index', compact('pendaftarans'));
    }

    public function create()
    {
        $pesertas = Peserta::all();
        $pakets = Paket::all();
        return view('admin.pendaftaran.create', compact('pesertas', 'pakets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_peserta' => 'required|exists:peserta,id_peserta',
            'id_paket' => 'required|exists:paket,id_paket',
            'status' => 'required|in:menunggu,sukses,batal',
        ]);

        // created_at otomatis diisi oleh Laravel, tidak perlu tanggal_daftar manual
        Pendaftaran::create([
            'id_peserta' => $request->id_peserta,
            'id_paket' => $request->id_paket,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Pendaftaran berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pendaftaran = Pendaftaran::with(['peserta', 'paket'])->findOrFail($id);
        return view('admin.pendaftaran.show', compact('pendaftaran'));
    }

    public function edit($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pesertas = Peserta::all();
        $pakets = Paket::all();
        return view('admin.pendaftaran.edit', compact('pendaftaran', 'pesertas', 'pakets'));
    }

    public function update(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        $request->validate([
            'id_peserta' => 'required|exists:peserta,id_peserta',
            'id_paket' => 'required|exists:paket,id_paket',
            'status' => 'required|in:menunggu,sukses,batal',
        ]);

        $pendaftaran->update([
            'id_peserta' => $request->id_peserta,
            'id_paket' => $request->id_paket,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Pendaftaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Pendaftaran berhasil dihapus.');
    }
}
