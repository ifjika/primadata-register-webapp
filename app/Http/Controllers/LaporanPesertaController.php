<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanPesertaController extends Controller
{
    public function index()
    {
        $laporan = Laporan::orderBy('created_at', 'desc')->get();
        return view('admin.laporan.peserta.index', compact('laporan'));
    }

    public function create()
    {
        return view('admin.laporan.peserta.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'periode' => 'required|date_format:Y-m',
            'omset',
        ]);

        $periode = $request->periode;

        $startDate = Carbon::createFromFormat('Y-m', $periode)->startOfMonth();
        $endDate = Carbon::createFromFormat('Y-m', $periode)->endOfMonth();

        $idPendaftaranLunas = Pembayaran::where('status', 'lunas')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->pluck('id_pendaftaran');

        $jumlah_peserta = Pendaftaran::whereIn('id_pendaftaran', $idPendaftaranLunas)
            ->select('id_peserta')
            ->distinct()
            ->count();


        $omset = Pembayaran::whereBetween('created_at', [$startDate, $endDate])
            ->where('status', 'lunas')
            ->sum('jumlah_bayar');

        Laporan::create([
            'periode' => $periode,
            'jumlah_peserta' => $jumlah_peserta,
            'omset' => $omset,
        ]);

        return redirect()->route('admin.laporan.peserta.index')->with('success', 'Laporan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('admin.laporan.peserta.edit', compact('laporan'));
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

        return redirect()->route('admin.laporan.peserta.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    public function show($id)
    {
        $laporan = Laporan::findOrFail($id);
        $periode = $laporan->periode;

        $startDate = Carbon::createFromFormat('Y-m', $periode)->startOfMonth();
        $endDate = Carbon::createFromFormat('Y-m', $periode)->endOfMonth();

        $pembayarans = Pembayaran::with(['pendaftaran.peserta', 'pendaftaran.paket'])
            ->where('status', 'lunas')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        return view('admin.laporan.peserta.show', compact('laporan', 'pembayarans'));
    }


    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('admin.laporan.peserta.index')->with('success', 'Laporan berhasil dihapus.');
    }

    public function cetak($id)
    {
        $laporan = Laporan::findOrFail($id);
        $periode = $laporan->periode;

        $startDate = Carbon::createFromFormat('Y-m', $periode)->startOfMonth();
        $endDate = Carbon::createFromFormat('Y-m', $periode)->endOfMonth();

        $pembayarans = Pembayaran::with(['pendaftaran.peserta', 'pendaftaran.paket'])
            ->where('status', 'lunas')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        $pdf = Pdf::loadView('admin.laporan.peserta.pdf', compact('laporan', 'pembayarans'));

        return $pdf->download('Laporan-Peserta-' . $laporan->periode . '.pdf');
    }
}
