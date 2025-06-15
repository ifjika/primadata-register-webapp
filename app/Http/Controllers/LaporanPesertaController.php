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

        // Ambil semua pembayaran lunas pada periode
        $pembayarans = Pembayaran::with(['pendaftaran.peserta', 'pendaftaran.paket'])
            ->where('status', 'lunas')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        $kategoriPaket = ['6 bulan', '3 bulan', 'reguler'];
        $blokPesertaData = [];
        $pembayaransTerurut = collect(); // koleksi baru untuk menyimpan data pembayaran urut dan unik

        foreach ($kategoriPaket as $kategori) {
            // Filter pembayaran sesuai kategori paket (case insensitive)
            $filtered = $pembayarans->filter(function ($pembayaran) use ($kategori) {
                $namaPaket = strtolower($pembayaran->pendaftaran->paket->nama_paket ?? '');
                return str_contains($namaPaket, strtolower($kategori));
            });

            // Kelompokkan berdasarkan jurusan dan nama peserta unik
            $pesertaUnikPerJurusan = [];

            foreach ($filtered as $pembayaran) {
                $jurusan = $pembayaran->pendaftaran->paket->jurusan ?? '';
                $namaPeserta = $pembayaran->pendaftaran->peserta->nama ?? '';

                if (!isset($pesertaUnikPerJurusan[$jurusan])) {
                    $pesertaUnikPerJurusan[$jurusan] = [];
                }

                // Simpan hanya pembayaran pertama dari peserta unik per jurusan
                if (!array_key_exists($namaPeserta, $pesertaUnikPerJurusan[$jurusan])) {
                    $pesertaUnikPerJurusan[$jurusan][$namaPeserta] = $pembayaran;
                }
            }

            // Urutkan jurusan berdasarkan abjad
            ksort($pesertaUnikPerJurusan);

            // Untuk setiap jurusan, urutkan peserta berdasarkan nama abjad
            $jumlahPerJurusan = [];
            foreach ($pesertaUnikPerJurusan as $jurusan => $pesertas) {
                ksort($pesertas);

                $jumlahPerJurusan[$jurusan] = count($pesertas);

                // Tambahkan peserta unik terurut ke koleksi $pembayaransTerurut
                foreach ($pesertas as $pembayaran) {
                    $pembayaransTerurut->push($pembayaran);
                }
            }

            // Simpan jumlah peserta per jurusan ke blok data dengan key kategori paket
            $blokPesertaData[$kategori] = $jumlahPerJurusan;
        }

        // Hitung total peserta unik (distinct id_user) untuk periode dan status lunas
        $totalPeserta = Pembayaran::where('status', 'lunas')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->distinct('id_pendaftaran')
            ->count('id_pendaftaran');

        return Pdf::loadView('admin.laporan.peserta.pdf', [
            'laporan' => $laporan,
            'pembayarans' => $pembayaransTerurut,
            'blokPesertaData' => $blokPesertaData,
            'totalPeserta' => $totalPeserta,
        ])->download('Laporan-Peserta-' . $laporan->periode . '.pdf');
    }
}
