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
            'informasi_program' => 'required|array|min:1|max:4', // Menyesuaikan validasi dengan array
            'informasi_program.*' => 'required|string|max:255',
            'materi' => 'required|array|min:1|max:9',
            'materi.*' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        // Gabungkan informasi_program menjadi satu string dengan newline
        $info_program_array = $request->input('informasi_program');
        $informasi_program = implode("\n", array_filter($info_program_array)); // Menggabungkan informasi program

        $materi_array = $request->input('materi', []);
        $materi_array = array_filter($materi_array); // buang yang kosong

        if (count($materi_array) === 0) {
            return back()->withErrors(['materi' => 'Materi wajib diisi.'])->withInput();
        }

        $materi = implode("\n", $materi_array);


        // Simpan data dengan informasi_program yang sudah digabungkan
        Paket::create([
            'nama_paket' => $request->nama_paket,
            'jurusan' => $request->jurusan,
            'biaya' => $request->biaya,
            'informasi_program' => $informasi_program, // Simpan informasi_program yang digabung
            'materi' => $materi,
            'deskripsi' => $request->deskripsi,
        ]);

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
            'informasi_program' => 'required|array|min:1|max:4',
            'informasi_program.*' => 'required|string|max:255',
            'materi' => 'required|array|min:1|max:9',
            'materi.*' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        // Gabungkan informasi_program menjadi satu string dengan newline
        $info_program_array = $request->input('informasi_program');
        $informasi_program = implode("\n", array_filter($info_program_array)); // Menggabungkan informasi program

        $materi_array = $request->input('materi', []);
        $materi_array = array_filter($materi_array); // buang yang kosong

        if (count($materi_array) === 0) {
            return back()->withErrors(['materi' => 'Materi wajib diisi.'])->withInput();
        }

        $materi = implode("\n", $materi_array);


        // Update data dengan informasi_program yang sudah digabungkan
        $paket->update([
            'nama_paket' => $request->nama_paket,
            'jurusan' => $request->jurusan,
            'biaya' => $request->biaya,
            'informasi_program' => $informasi_program, // Simpan informasi_program yang digabung
            'materi' => $materi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $paket = Paket::findOrFail($id);
        $paket->delete();

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil dihapus.');
    }
}
