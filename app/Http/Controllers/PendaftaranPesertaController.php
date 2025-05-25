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
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pesertas = Peserta::all();
        $pakets = Paket::all();
        return view('admin.pendaftaran.edit', compact('pendaftaran', 'pesertas', 'pakets'));
    }

    public function update(Request $request, $id)
    {
        $peserta = Peserta::findOrFail($id);

        $request->validate([
            'id_user' => 'required|integer|exists:users,id',
            'nama_peserta' => 'required|string|max:255',
            'nik_ktp' => 'required|size:16|regex:/^[0-9]+$/',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:50',
            'pendidikan' => 'required|string|max:50',
            'no_wa' => 'required|string|max:20',
            'alamat' => 'required|string',
            'kelurahan' => 'required|string',
            'kecamatan' => 'required|string',
            'kota' => 'required|string',
            'provinsi' => 'required|string',
            'tempat_tinggal' => 'required|in:Bersama Orang Tua,Kost,Asrama,Panti Asuhan,Lainnya',
        ]);

        $peserta->update($request->all());

        return redirect()->route('admin.peserta.index')->with('success', 'Peserta berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->delete();

        return redirect()->route('admin.peserta.index')->with('success', 'Peserta berhasil dihapus.');
    }
}
