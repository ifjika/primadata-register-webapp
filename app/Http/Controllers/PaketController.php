<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    // Menampilkan semua paket
    public function index()
    {
        $pakets = Paket::all();
        return view('admin.paket.index', compact('pakets'));
    }

    // Menampilkan form untuk membuat paket baru
    public function create()
    {
        return view('admin.paket.create');
    }

    // Menyimpan paket baru ke database
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama_paket' => 'required|string|max:50',
            'jurusan' => 'required|string|max:100',
            'biaya' => 'required|numeric',
            'deskripsi' => 'required|string',
        ]);

        // Membuat paket baru
        Paket::create($request->all());

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil ditambahkan.');
    }

    // Menampilkan detail paket berdasarkan ID
    public function show($id)
    {
        $paket = Paket::findOrFail($id);
        return view('admin.paket.show', compact('paket'));
    }

    // Menampilkan form untuk mengedit paket
    public function edit($id)
    {
        $paket = Paket::findOrFail($id);
        return view('admin.paket.edit', compact('paket'));
    }

    // Memperbarui paket yang ada
    public function update(Request $request, $id)
    {
        $paket = Paket::findOrFail($id);

        // Validasi data input
        $request->validate([
            'nama_paket' => 'required|string|max:50',
            'jurusan' => 'required|string|max:100',
            'biaya' => 'required|numeric',
            'deskripsi' => 'required|string',
        ]);

        // Memperbarui data paket
        $paket->update($request->all());

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil diperbarui.');
    }

    // Menghapus paket berdasarkan ID
    public function destroy($id)
    {
        $paket = Paket::findOrFail($id);
        $paket->delete();

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil dihapus.');
    }
}