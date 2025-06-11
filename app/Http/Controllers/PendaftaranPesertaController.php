<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Peserta;
use App\Models\Paket;
use App\Models\User;

use Illuminate\Http\Request;

class PendaftaranPesertaController extends Controller
{
    public function index()
    {
        $pendaftarans = Pendaftaran::with(['peserta', 'paket'])->get();
        return view('admin.pendaftaran.index', compact('pendaftarans'));
    }

    public function create()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.pendaftaran.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user' => 'required|integer|exists:users,id',
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

        session(['pendaftaran_peserta' => $validated]);

        return redirect()->route('admin.pendaftaran.paket.create');
    }

    public function show($id)
    {
        $peserta = Peserta::findOrFail($id);
        return view('admin.peserta.show', compact('peserta'));
    }

    public function edit($id)
    {
        $pendaftaran = Pendaftaran::with('peserta', 'paket')->findOrFail($id);
        $peserta = $pendaftaran->peserta;
        $pakets = Paket::all();
        $users = User::where('role', 'user')->get();
        return view('admin.pendaftaran.edit', compact('pendaftaran', 'peserta', 'pakets', 'users'));
    }

    public function update(Request $request, $id)
    {
        $peserta = Peserta::findOrFail($id);

        $validated = $request->validate([
            'id_user' => 'required|integer|exists:users,id',
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

        session(['pendaftaran_peserta' => $validated]);

        $pendaftaran = Pendaftaran::where('id_peserta', $peserta->id_peserta)->first();

        if (!$pendaftaran) {
            return redirect()->route('admin.pendaftaran.index')->with('error', 'Pendaftaran tidak ditemukan.');
        }

        return redirect()->route('admin.pendaftaran.paket.edit', ['id' => $pendaftaran->id_pendaftaran]);
    }

    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $peserta = $pendaftaran->peserta;

        $pendaftaran->delete();

        if ($peserta && $peserta->pendaftarans()->count() === 0) {
            $peserta->delete();
        }

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Pendaftaran berhasil dihapus.');
    }
}
