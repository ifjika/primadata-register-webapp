<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $peserta = Peserta::all();
        return view('admin.peserta.index', compact('peserta'));
    }

    public function create()
    {
        return view('admin.peserta.create');
    }

    public function store(Request $request)
    {
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

        Peserta::create($request->all());

        return redirect()->route('admin.peserta.index')->with('success', 'Peserta berhasil ditambahkan.');
    }

    public function show($id)
    {
        $peserta = Peserta::findOrFail($id);
        return view('admin.peserta.show', compact('peserta'));
    }

    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        return view('admin.peserta.edit', compact('peserta'));
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
