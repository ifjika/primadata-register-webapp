<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Berkas;
use App\Models\Peserta;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BerkasController extends Controller
{
    public function index()
    {
        $berkas = Berkas::with(['user.peserta', 'pendaftaran.paket'])->get();

        return view('admin.berkas.index', compact('berkas'));
    }


    public function create()
    {
        $pesertaSudahAdaBerkas = Berkas::with('pendaftaran')
            ->get()
            ->pluck('pendaftaran.id_peserta')
            ->unique()
            ->toArray();

        $pendaftaran = Pendaftaran::with(['peserta', 'paket'])
            ->whereNotIn('id_peserta', $pesertaSudahAdaBerkas)
            ->get()
            ->unique('id_peserta');

        return view('admin.berkas.create', compact('pendaftaran'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_pendaftaran' => 'required|integer|exists:pendaftaran,id_pendaftaran',
            'ijazah' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'kk' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'ktp' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'pas_foto' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $pendaftaran = Pendaftaran::with('peserta.user')->findOrFail($request->id_pendaftaran);
        $idPeserta = $pendaftaran->id_peserta;

        $sudahAda = Berkas::whereHas('pendaftaran', function ($query) use ($idPeserta) {
            $query->where('id_peserta', $idPeserta);
        })->exists();

        if ($sudahAda) {
            return back()->withErrors(['Peserta ini sudah memiliki berkas.'])->withInput();
        }

        $idUser = $pendaftaran->peserta->user->id;

        $berkas = Berkas::create([
            'id_user' => $idUser,
            'id_pendaftaran' => $request->id_pendaftaran,
            'ijazah' => '',
            'kk' => '',
            'ktp' => '',
            'pas_foto' => '',
        ]);

        $tanggal = now()->format('Ymd_His');
        $folderName = "berkas/{$berkas->id}_{$berkas->id_user}_{$tanggal}";

        $berkas->update([
            'ijazah' => $request->file('ijazah')->store("{$folderName}/ijazah", 'public'),
            'kk' => $request->file('kk')->store("{$folderName}/kk", 'public'),
            'ktp' => $request->file('ktp')->store("{$folderName}/ktp", 'public'),
            'pas_foto' => $request->file('pas_foto')->store("{$folderName}/pas_foto", 'public'),
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

        $pendaftaran = Pendaftaran::with(['peserta.user', 'paket'])->get();

        return view('admin.berkas.edit', compact('berkas', 'pendaftaran'));
    }


    public function update(Request $request, $id)
    {
        $berkas = Berkas::findOrFail($id);

        $request->validate([
            'id_pendaftaran' => 'required|integer|exists:pendaftaran,id_pendaftaran',
            'ijazah' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'kk' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'ktp' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'pas_foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $pendaftaran = Pendaftaran::with('peserta.user')->findOrFail($request->id_pendaftaran);
        $idUser = $pendaftaran->peserta->user->id ?? null;

        if (!$idUser) {
            return back()->withErrors(['id_pendaftaran' => 'Data user peserta tidak ditemukan.'])->withInput();
        }

        $berkas->id_user = $idUser;
        $berkas->id_pendaftaran = $request->id_pendaftaran;


        $tanggal = Carbon::parse($berkas->created_at)->format('dmY_His');
        $folderName = "berkas/{$berkas->id}_{$berkas->id_user}_{$tanggal}";

        // Update file jika ada
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

        return redirect()->route('admin.berkas.index')->with('success', 'Berkas berhasil dihapus.');
    }
}
