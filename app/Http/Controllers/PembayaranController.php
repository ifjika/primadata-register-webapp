<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    // Tampilkan semua data pembayaran
    public function index()
    {
        $pembayaran = Pembayaran::with('pendaftaran.peserta')->latest()->get();
        return view('admin.pembayaran.index', compact('pembayaran'));
    }

    // Tampilkan form tambah pembayaran
    public function create()
    {

        $pendaftaran = Pendaftaran::with('peserta')->get();
        return view('admin.pembayaran.create', compact('pendaftaran'));
    }

    // Simpan data pembayaran baru
    public function store(Request $request)
    {
        $request->validate([
            'id_pendaftaran' => 'required|exists:pendaftaran,id_pendaftaran',
            'metode_bayar' => 'required|string|max:255',
            'jumlah_bayar' => 'required|numeric',
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:Lunas,Belum Lunas',
        ]);

        $path = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $path = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }

        Pembayaran::create([
            'id_pendaftaran' => $request->id_pendaftaran,
            'metode_bayar' => $request->metode_bayar,
            'jumlah_bayar' => $request->jumlah_bayar,
            'bukti_pembayaran' => $path,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.pembayaran.index')->with('success', 'Data pembayaran berhasil ditambahkan.');
    }

    // Tampilkan detail pembayaran
    public function show($id)
    {
        $pembayaran = Pembayaran::with('pendaftaran')->findOrFail($id);
        return view('admin.pembayaran.show', compact('pembayaran'));
    }

    // Tampilkan form edit pembayaran
    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pendaftarans = Pendaftaran::with('peserta.user')->get();

        // Ambil enum values untuk kolom 'status'
        $statusType = DB::select("SHOW COLUMNS FROM pembayaran WHERE Field = 'status'")[0]->Type;
        preg_match("/^enum\((.*)\)$/", $statusType, $statusMatches);
        $enumStatus = [];
        if (isset($statusMatches[1])) {
            $enumStatus = array_map(function ($value) {
                return trim($value, "'");
            }, explode(",", $statusMatches[1]));
        }

        // Ambil enum values untuk kolom 'metode_bayar'
        $metodeType = DB::select("SHOW COLUMNS FROM pembayaran WHERE Field = 'metode_bayar'")[0]->Type;
        preg_match("/^enum\((.*)\)$/", $metodeType, $metodeMatches);
        $enumMetode = [];
        if (isset($metodeMatches[1])) {
            $enumMetode = array_map(function ($value) {
                return trim($value, "'");
            }, explode(",", $metodeMatches[1]));
        }

        return view('admin.pembayaran.edit', [
            'pembayaran' => $pembayaran,
            'pendaftarans' => $pendaftarans,
            'enumValuesStatus' => $enumStatus,
            'enumValuesMetode' => $enumMetode,
        ]);
    }


    // Update data pembayaran
    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $request->validate([
            'id_pendaftaran' => 'required|exists:pendaftaran,id_pendaftaran',
            'metode_bayar' => 'required|string|max:255',
            'jumlah_bayar' => 'required|numeric',
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:Lunas,Belum Lunas',

        ]);

        $data = $request->only(['id_pendaftaran', 'metode_bayar', 'jumlah_bayar', 'status']);

        if ($request->hasFile('bukti_pembayaran')) {
            if ($pembayaran->bukti_pembayaran) {
                Storage::disk('public')->delete($pembayaran->bukti_pembayaran);
            }
            $data['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        } else {
            $data['bukti_pembayaran'] = $pembayaran->bukti_pembayaran;
        }


        $pembayaran->update($data);

        return redirect()->route('admin.pembayaran.index')->with('success', 'Data pembayaran berhasil diperbarui.');
    }

    // Hapus data pembayaran
    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        if ($pembayaran->bukti_pembayaran) {
            Storage::disk('public')->delete($pembayaran->bukti_pembayaran);
        }

        $pembayaran->delete();

        return redirect()->route('admin.pembayaran.index')->with('success', 'Data pembayaran berhasil dihapus.');
    }
}
