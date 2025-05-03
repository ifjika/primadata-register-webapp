<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use Illuminate\Http\Request;

class BerkasController extends Controller
{
    public function index()
    {
        $berkas = Berkas::all();
        return view('admin.berkas', compact('berkas'));
    }

    public function create()
    {
        return view('admin.berkas_create');
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

        $ijazahPath   = $request->file('ijazah')->store('berkas/ijazah', 'public');
        $kkPath       = $request->file('kk')->store('berkas/kk', 'public');
        $ktpPath      = $request->file('ktp')->store('berkas/ktp', 'public');
        $fotoPath     = $request->file('pas_foto')->store('berkas/pas_foto', 'public');

        Berkas::create([
            'id_user' => $request->id_user,
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
        return view('admin.berkas_show', compact('berkas'));
    }

    public function edit($id)
    {
        $berkas = Berkas::findOrFail($id);
        return view('admin.berkas_edit', compact('berkas'));
    }

    public function update(Request $request, $id)
    {
        $berkas = Berkas::findOrFail($id);

        $validated = $request->validate([
            'id_user' => 'required|integer|exists:users,id',
            'ijazah' => 'nullable|file',
            'kk' => 'nullable|file',
            'ktp' => 'nullable|file',
            'pas_foto' => 'nullable|file',
        ]);

        $berkas->id_user = $validated['id_user'];

        if ($request->hasFile('ijazah')) {
            $berkas->ijazah = file_get_contents($request->file('ijazah')->getRealPath());
        }
        if ($request->hasFile('kk')) {
            $berkas->kk = file_get_contents($request->file('kk')->getRealPath());
        }
        if ($request->hasFile('ktp')) {
            $berkas->ktp = file_get_contents($request->file('ktp')->getRealPath());
        }
        if ($request->hasFile('pas_foto')) {
            $berkas->pas_foto = file_get_contents($request->file('pas_foto')->getRealPath());
        }

        $berkas->save();

        return redirect()->route('admin', ['page' => 'berkas'])->with('success', 'Berkas updated successfully.');
    }

    public function destroy($id)
    {
        $berkas = Berkas::findOrFail($id);
        $berkas->delete();

        return redirect()->route('admin', ['page' => 'berkas'])->with('success', 'Berkas deleted successfully.');
    }
}
