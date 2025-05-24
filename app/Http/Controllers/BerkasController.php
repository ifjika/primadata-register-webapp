<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BerkasController extends Controller
{
    public function index()
    {
        $berkas = Berkas::all();
        $user = User::all();
        return view('admin.berkas.index', compact('berkas', 'user'));
    }

    public function create()
    {
        $peserta = Peserta::with('user')->get();
        return view('admin.berkas.create', compact('peserta'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|integer|exists:users,id',
            'ijazah' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'kk' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'ktp' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'pas_foto' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $berkas = Berkas::create([
            'id_user' => $request->id_user,
            'ijazah' => '',
            'kk' => '',
            'ktp' => '',
            'pas_foto' => '',
        ]);

        $folderName = "berkas/{$berkas->id}_{$request->id_user}";

        $ijazahPath   = $request->file('ijazah')->store("berkas/{$folderName}/ijazah", 'public');
        $kkPath       = $request->file('kk')->store("berkas/{$folderName}/kk", 'public');
        $ktpPath      = $request->file('ktp')->store("berkas/{$folderName}/ktp", 'public');
        $fotoPath     = $request->file('pas_foto')->store("berkas/{$folderName}/pas_foto", 'public');

        $berkas->update([
            'ijazah' => $ijazahPath,
            'kk' => $kkPath,
            'ktp' => $ktpPath,
            'pas_foto' => $fotoPath,
        ]);

        return redirect()->route('admin.berkas.index')->with('success', 'Berkas berhasil ditambahkan.');
    }

    public function show($id)
    {
        $berkas = Berkas::findOrFail($id);
        return view('admin.berkas.show', compact('berkas'));
    }

    public function edit($id)
    {
        $berkas = Berkas::findOrFail($id);
        $peserta = Peserta::with('user')->get();

        return view('admin.berkas.edit', compact('berkas', 'peserta'));
    }


    public function update(Request $request, $id)
    {
        $berkas = Berkas::findOrFail($id);

        $validated = $request->validate([
            'id_user' => 'required|integer|exists:users,id',
            'ijazah' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'kk' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'ktp' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'pas_foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $berkas->id_user = $validated['id_user'];

        // Nama folder khusus
        $folderName = "berkas/{$berkas->id}_{$berkas->id_user}";

        if ($request->hasFile('ijazah')) {
            if ($berkas->ijazah && Storage::disk('public')->exists($berkas->ijazah)) {
                Storage::disk('public')->delete($berkas->ijazah);
            }
            $berkas->ijazah = $request->file('ijazah')->store("{$folderName}/ijazah", 'public');
        }

        if ($request->hasFile('kk')) {
            if ($berkas->kk && Storage::disk('public')->exists($berkas->kk)) {
                Storage::disk('public')->delete($berkas->kk);
            }
            $berkas->kk = $request->file('kk')->store("{$folderName}/kk", 'public');
        }

        if ($request->hasFile('ktp')) {
            if ($berkas->ktp && Storage::disk('public')->exists($berkas->ktp)) {
                Storage::disk('public')->delete($berkas->ktp);
            }
            $berkas->ktp = $request->file('ktp')->store("{$folderName}/ktp", 'public');
        }

        if ($request->hasFile('pas_foto')) {
            if ($berkas->pas_foto && Storage::disk('public')->exists($berkas->pas_foto)) {
                Storage::disk('public')->delete($berkas->pas_foto);
            }
            $berkas->pas_foto = $request->file('pas_foto')->store("{$folderName}/pas_foto", 'public');
        }

        $berkas->save();

        return redirect()->route('admin.berkas.index')->with('success', 'Berkas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berkas = Berkas::findOrFail($id);
        $berkas->delete();

        return redirect()->route('admin', ['page' => 'berkas'])->with('success', 'Berkas deleted successfully.');
    }
}
