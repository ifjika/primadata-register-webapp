<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::all();
        return view('admin.paket.index', compact('pakets'));
    }

    public function create()
    {
        return view('admin.paket.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:50',
            'jurusan' => 'required|string|max:100',
            'biaya' => 'required|numeric',
            'deskripsi' => 'required|string',
        ]);

        Paket::create($request->all());

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil ditambahkan.');
    }

    public function show($id)
    {
        $paket = Paket::findOrFail($id);
        return view('admin.paket.show', compact('paket'));
    }

    public function edit($id)
    {
        $paket = Paket::findOrFail($id);
        return view('admin.paket.edit', compact('paket'));
    }

    public function update(Request $request, $id)
    {
        $paket = Paket::findOrFail($id);

        $request->validate([
            'nama_paket' => 'required|string|max:50',
            'jurusan' => 'required|string|max:100',
            'biaya' => 'required|numeric',
            'deskripsi' => 'required|string',
        ]);

        $paket->update($request->all());

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $paket = Paket::findOrFail($id);
        $paket->delete();

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil dihapus.');
    }
}
