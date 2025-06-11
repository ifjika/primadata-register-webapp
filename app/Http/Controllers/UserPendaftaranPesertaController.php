<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Peserta;
use App\Models\Paket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class UserPendaftaranPesertaController extends Controller
{

    public function index()
    {
        $userId = Auth::id();
        $pendaftarans = Pendaftaran::with(['peserta', 'paket'])
            ->whereHas('peserta', function ($query) use ($userId) {
                $query->where('id_user', $userId);
            })
            ->get();

        return view('user.pendaftaran.index', compact('pendaftarans'));
    }


    public function create()
    {
        $users = User::where('role', 'user')->get();
        return view('user.pendaftaran.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_peserta'     => 'required|string|max:255',
            'nik_ktp'          => 'required|digits:16',
            'tempat_lahir'     => 'required|string|max:100',
            'tanggal_lahir'    => 'required|date',
            'jenis_kelamin'    => 'required|in:Laki-laki,Perempuan',
            'agama'            => 'required|string|max:50',
            'pendidikan'       => 'required|string|max:50',
            'no_wa'            => 'required|digits_between:9,13',
            'alamat'           => 'required|string',
            'kelurahan'        => 'required|string',
            'kecamatan'        => 'required|string',
            'kota'             => 'required|string',
            'provinsi'         => 'required|string',
            'tempat_tinggal'   => 'required|in:Bersama Orang Tua,Kost,Asrama,Panti Asuhan,Lainnya',
        ]);

        // Tambahkan id_user dari user yang login
        $validated['id_user'] = Auth::id();

        // Simpan semua data ke dalam session untuk digunakan di langkah berikutnya
        session(['pendaftaran_peserta' => $validated]);

        return redirect()->route('user.pendaftaran.paket.create');
    }


    public function show($id)
    {
        $peserta = Peserta::findOrFail($id);
        return view('user.peserta.show', compact('peserta'));
    }

    public function edit($id)
    {
        $pendaftaran = Pendaftaran::with('peserta', 'paket')->findOrFail($id);
        $peserta = $pendaftaran->peserta;
        $pakets = Paket::all();

        return view('user.pendaftaran.edit', compact('pendaftaran', 'peserta', 'pakets'));
    }

    public function update(Request $request, $id)
    {
        $peserta = Peserta::findOrFail($id);

        // Dapatkan ID user yang sedang login
        $id_user = auth()->id();

        $validated = $request->validate([
            // Tidak lagi validasi id_user dari form, karena sudah diketahui dari auth
            'nama_peserta' => 'required|string|max:255',
            'nik_ktp' => 'required|digits:16',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:50',
            'pendidikan' => 'required|string|max:50',
            'no_wa' => 'required|digits_between:9,13',
            'alamat' => 'required|string',
            'kelurahan' => 'required|string',
            'kecamatan' => 'required|string',
            'kota' => 'required|string',
            'provinsi' => 'required|string',
            'tempat_tinggal' => 'required|in:Bersama Orang Tua,Kost,Asrama,Panti Asuhan,Lainnya',
        ]);

        // Gabungkan data validasi dengan id_user login
        $validated['id_user'] = $id_user;

        // Simpan ke session
        session(['pendaftaran_peserta' => $validated]);

        // Ambil pendaftaran berdasarkan peserta
        $pendaftaran = Pendaftaran::where('id_peserta', $peserta->id_peserta)->first();

        if (!$pendaftaran) {
            return redirect()->route('user.pendaftaran.index')->with('error', 'Pendaftaran tidak ditemukan.');
        }

        return redirect()->route('user.pendaftaran.paket.edit', ['id' => $pendaftaran->id_pendaftaran]);
    }

    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $peserta = $pendaftaran->peserta;

        $pendaftaran->delete();

        if ($peserta && $peserta->pendaftarans()->count() === 0) {
            $peserta->delete();
        }

        return redirect()->route('user.pendaftaran.index')->with('success', 'Pendaftaran berhasil dihapus.');
    }
}
