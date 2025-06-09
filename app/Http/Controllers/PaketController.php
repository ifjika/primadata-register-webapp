<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            'informasi_program' => 'required|array|min:1|max:4',
            'informasi_program.*' => 'required|string|max:255',
            'materi' => 'required|array|min:1|max:9',
            'materi.*' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $info_program_array = $request->input('informasi_program');
        $informasi_program = implode("\n", array_filter($info_program_array));

        $materi_array = $request->input('materi', []);
        $materi_array = array_filter($materi_array);

        if (count($materi_array) === 0) {
            return back()->withErrors(['materi' => 'Materi wajib diisi.'])->withInput();
        }

        $materi = implode("\n", $materi_array);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            // Membuat folder berdasarkan tahun, bulan, dan tanggal
            $now = now();
            $folderPath = "paket_gambar/{$now->year}/{$now->format('m')}/{$now->format('d')}";

            // Membuat nama file gambar baru dengan format: GambarPaket-{jurusan}-{id}.{ext}
            $jurusan = Str::slug($request->input('jurusan')); // Menggunakan slug untuk nama jurusan agar aman sebagai nama file
            $fileExtension = $request->file('gambar')->getClientOriginalExtension();
            $gambarName = "GambarPaket-{$jurusan}-" . time() . ".{$fileExtension}"; // Menggunakan time() agar nama file unik
            $gambarPath = $request->file('gambar')->storeAs($folderPath, $gambarName, 'public');
        }

        $paket = Paket::create([
            'nama_paket' => $request->nama_paket,
            'jurusan' => $request->jurusan,
            'biaya' => $request->biaya,
            'informasi_program' => $informasi_program,
            'materi' => $materi,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
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
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $info_program_array = $request->input('informasi_program');
        $informasi_program = implode("\n", array_filter($info_program_array));

        $materi_array = $request->input('materi', []);
        $materi_array = array_filter($materi_array);

        if (count($materi_array) === 0) {
            return back()->withErrors(['materi' => 'Materi wajib diisi.'])->withInput();
        }

        $materi = implode("\n", $materi_array);

        // Menghapus gambar lama jika ada dan mengganti dengan gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($paket->gambar && Storage::disk('public')->exists($paket->gambar)) {
                Storage::disk('public')->delete($paket->gambar);
            }

            // Membuat nama file gambar baru dengan format: GambarPaket-{jurusan}-{id}.{ext}
            $now = now();
            $folderPath = "paket_gambar/{$now->year}/{$now->format('m')}/{$now->format('d')}";
            $jurusan = Str::slug($request->input('jurusan'));
            $fileExtension = $request->file('gambar')->getClientOriginalExtension();
            $gambarName = "GambarPaket-{$jurusan}-" . time() . ".{$fileExtension}";
            $gambarPath = $request->file('gambar')->storeAs($folderPath, $gambarName, 'public');
            $paket->gambar = $gambarPath;
        }

        $paket->update([
            'nama_paket' => $request->nama_paket,
            'jurusan' => $request->jurusan,
            'biaya' => $request->biaya,
            'informasi_program' => $informasi_program,
            'materi' => $materi,
            'deskripsi' => $request->deskripsi,
            'gambar' => $paket->gambar,
        ]);

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $paket = Paket::findOrFail($id);

        if ($paket->gambar && Storage::disk('public')->exists($paket->gambar)) {
            Storage::disk('public')->delete($paket->gambar);
        }

        $paket->delete();

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil dihapus.');
    }

    public function dashboard()
    {
        $paket = Paket::all();

        return view('dashboard', compact('paket'));
    }
}
