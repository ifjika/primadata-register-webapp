<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::orderBy('created_at', 'desc')->get();
        return view('admin.laporan.index', compact('laporan'));
    }

    public function create()
    {
        return view('admin.laporan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'periode' => 'required|string|max:100',
            'jumlah_peserta' => 'required|integer|min:0',
            'omset' => 'required|numeric|min:0',
        ]);

        Laporan::create($request->all());

        return redirect()->route('admin.laporan.index')->with('success', 'Laporan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('admin.laporan.edit', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'periode' => 'required|string|max:100',
            'jumlah_peserta' => 'required|integer|min:0',
            'omset' => 'required|numeric|min:0',
        ]);

        $laporan = Laporan::findOrFail($id);
        $laporan->update($request->all());

        return redirect()->route('admin.laporan.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('admin.laporan.index')->with('success', 'Laporan berhasil dihapus.');
    }
}
