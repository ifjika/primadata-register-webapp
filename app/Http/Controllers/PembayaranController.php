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
        $pembayaran = Pembayaran::with('pendaftaran.peserta', 'pendaftaran.paket')
            ->latest()
            ->get()
            ->unique('id_pendaftaran');

        return view('admin.pembayaran.index', compact('pembayaran'));
    }


    // Tampilkan form tambah pembayaran
    public function create()
    {

        $pendaftaran = Pendaftaran::with('peserta', 'paket')->get();
        return view('admin.pembayaran.create', compact('pendaftaran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pendaftaran' => 'required|exists:pendaftaran,id_pendaftaran',
            'metode_bayar' => 'required|string|max:255',
            'jumlah_bayar' => 'required|numeric',
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:Lunas,Belum Lunas',
        ]);


        $pembayaran = Pembayaran::create([
            'id_pendaftaran' => $request->id_pendaftaran,
            'metode_bayar' => $request->metode_bayar,
            'jumlah_bayar' => $request->jumlah_bayar,
            'bukti_pembayaran' => null,
            'status' => $request->status,
        ]);

        if ($request->hasFile('bukti_pembayaran')) {
            $folderName = $request->id_pendaftaran . '_' . $pembayaran->id_pembayaran;
            $filePath = $request->file('bukti_pembayaran')->store("bukti_pembayaran/{$folderName}", 'public');

            $pembayaran->update([
                'bukti_pembayaran' => $filePath,
            ]);
        }

        return redirect()->route('admin.pembayaran.index')->with('success', 'Data pembayaran berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pembayaran = Pembayaran::with('pendaftaran.peserta', 'pendaftaran.paket')->findOrFail($id);

        $pembayarans = Pembayaran::with('pendaftaran.peserta', 'pendaftaran.paket')
            ->where('id_pendaftaran', $pembayaran->id_pendaftaran)
            ->get();

        return view('admin.pembayaran.show', compact('pembayaran', 'pembayarans'));
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pendaftarans = Pendaftaran::with('peserta.user')->get();

        $daftarPembayaran = Pembayaran::where('id_pendaftaran', $pembayaran->id_pendaftaran)
            ->orderBy('created_at')
            ->get();

        $cicilanIndex = $daftarPembayaran->search(function ($item) use ($pembayaran) {
            return $item->id_pembayaran == $pembayaran->id_pembayaran;
        });
        $cicilanKe = ($cicilanIndex !== false) ? $cicilanIndex + 1 : null;


        $statusType = DB::select("SHOW COLUMNS FROM pembayaran WHERE Field = 'status'")[0]->Type;
        preg_match("/^enum\((.*)\)$/", $statusType, $statusMatches);
        $enumStatus = [];
        if (isset($statusMatches[1])) {
            $enumStatus = array_map(function ($value) {
                return trim($value, "'");
            }, explode(",", $statusMatches[1]));
        }

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
            'cicilanKe' => $cicilanKe,
            'totalCicilan' => $daftarPembayaran->count(),
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

        // Tangani file upload jika ada
        if ($request->hasFile('bukti_pembayaran')) {
            // Hapus file lama jika ada
            if ($pembayaran->bukti_pembayaran) {
                Storage::disk('public')->delete($pembayaran->bukti_pembayaran);
            }

            // Simpan file ke folder: id_pendaftaran_id_pembayaran
            $folderName = $request->id_pendaftaran . '_' . $pembayaran->id_pembayaran;
            $filePath = $request->file('bukti_pembayaran')->store("bukti_pembayaran/{$folderName}", 'public');

            $data['bukti_pembayaran'] = $filePath;
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
