<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Peserta;
use App\Models\Paket;
use Illuminate\Http\Request;

class PendaftaranPaketController extends Controller
{
    public function index()
    {
        // Ambil data pendaftaran beserta relasi peserta dan paket
        $pendaftarans = Pendaftaran::with(['peserta', 'paket'])->get();
        return view('admin.pendaftaran.index', compact('pendaftarans'));
    }

    public function create()
    {
        $peserta = session('pendaftaran_peserta');
        if (!$peserta) {
            return redirect()->route('admin.pendaftaran.create')->with('error', 'Data peserta belum diisi.');
        }
        $pakets = Paket::all();

        return view('admin.pendaftaran.paket.create', compact('peserta', 'pakets'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_paket' => 'required|exists:paket,id_paket',
            'status' => 'required|in:menunggu,sukses,batal',
        ]);

        $pesertaData = session('pendaftaran_peserta');
        if (!$pesertaData) {
            return redirect()->route('admin.pendaftaran.create')->with('error', 'Data peserta belum diisi.');
        }

        $peserta = Peserta::create($pesertaData);

        Pendaftaran::create([
            'id_peserta' => $peserta->id_peserta,
            'id_paket' => $request->id_paket,
            'status' => $request->status,
        ]);

        session()->forget('pendaftaran_peserta');

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Pendaftaran berhasil disimpan.');
    }


    public function show($id)
    {
        $pendaftaran = Pendaftaran::with(['peserta', 'paket'])->findOrFail($id);
        return view('admin.pendaftaran.show', compact('pendaftaran'));
    }

    public function edit($id)
    {
        // $pendaftaran = Pendaftaran::findOrFail($id);
        // $pesertas = Peserta::all();
        // $pakets = Paket::all();
        // return view('admin.pendaftaran.edit', compact('pendaftaran', 'pesertas', 'pakets'));
    }

    public function update(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        $request->validate([
            'id_peserta' => 'required|exists:peserta,id_peserta',
            'id_paket' => 'required|exists:paket,id_paket',
            'status' => 'required|in:menunggu,sukses,batal',
        ]);

        $pendaftaran->update($request->only('id_peserta', 'id_paket', 'status'));

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Pendaftaran berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Pendaftaran berhasil dihapus.');
    }
}
