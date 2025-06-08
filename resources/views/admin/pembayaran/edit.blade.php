@extends('adminlte::page')

@section('title', 'Edit Pembayaran')

@section('content_header')
<h1>Edit Pembayaran</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.pembayaran.update', $pembayaran->id_pembayaran) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- ID Pendaftaran (hidden dengan data atribut) --}}
            <input type="hidden" name="id_pendaftaran" id="id_pendaftaran"
                value="{{ $pembayaran->id_pendaftaran }}"
                data-nama_paket="{{ $pembayaran->pendaftaran->paket->nama_paket ?? '' }}"
                data-jurusan="{{ $pembayaran->pendaftaran->paket->jurusan ?? '' }}"
                data-jumlah_cicilan="{{ $pembayaran->pendaftaran->pembayaran->count() ?? 0 }}">

            {{-- Tampilkan ID Pendaftaran (readonly) --}}
            <div class="form-group">
                <label for="id_pendaftaran_display">ID Pendaftaran</label>
                <input type="text" id="id_pendaftaran_display" class="form-control"
                    value="{{ $pembayaran->id_pendaftaran ?? '-' }}" disabled>
            </div>

            {{-- Nama Peserta (readonly) --}}
            <div class="form-group">
                <label for="nama_peserta">Nama Peserta</label>
                <input type="text" id="nama_peserta" class="form-control"
                    value="{{ $pembayaran->pendaftaran->peserta->nama_peserta ?? '-' }}" readonly>
            </div>

            {{-- Cicilan Ke (readonly) --}}
            <div class="form-group">
                <label for="cicilan_ke">Cicilan Ke</label>
                <input type="text" name="cicilan_ke" id="cicilan_ke" class="form-control" readonly>
            </div>

            {{-- Metode Bayar --}}
            <div class="form-group">
                <label for="metode_bayar">Metode Bayar</label>
                <select name="metode_bayar" id="metode_bayar" class="form-control" required>
                    @foreach ($enumValuesMetode as $method)
                    <option value="{{ $method }}" {{ old('metode_bayar', $pembayaran->metode_bayar) == $method ? 'selected' : '' }}>
                        {{ ucfirst($method) }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- Jumlah Bayar --}}
            <div class="form-group">
                <label for="jumlah_bayar">Jumlah Bayar (Rp)</label>
                <input type="number" name="jumlah_bayar" id="jumlah_bayar"
                    class="form-control @error('jumlah_bayar') is-invalid @enderror"
                    value="{{ old('jumlah_bayar', $pembayaran->jumlah_bayar) }}" required>
                @error('jumlah_bayar')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Bukti Pembayaran --}}
            <div class="form-group">
                <label for="bukti_pembayaran">Bukti Pembayaran</label><br>
                @if ($pembayaran->bukti_pembayaran)
                <img src="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" alt="Bukti Pembayaran"
                    class="img-thumbnail mb-2" style="max-width: 200px;">
                @endif
                <input type="file" name="bukti_pembayaran" id="bukti_pembayaran"
                    class="form-control-file @error('bukti_pembayaran') is-invalid @enderror" accept="image/*">
                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah bukti pembayaran.</small>
                @error('bukti_pembayaran')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            {{-- Status --}}
            <div class="form-group">
                <label for="status">Status Pembayaran</label>
                <select name="status" id="status" class="form-control" required>
                    @foreach ($enumValuesStatus as $status)
                    <option value="{{ $status }}" {{ old('status', $pembayaran->status) == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- Submit dan kembali --}}
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Pembayaran</button>
                <a href="{{ route('admin.pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
            </div>

        </form>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const paketCicilan = {
            "6 Bulan": {
                "Administrasi Bisnis": [1800000, 600000, 600000, 600000, 600000, 600000],
                "Akuntasi Perpajakan": [1800000, 600000, 600000, 600000, 600000, 600000],
                "Teknik Sipil": [2900000, 850000, 850000, 850000, 850000, 850000],
                "Web Programming": [2900000, 850000, 850000, 850000, 850000, 850000]
            },
            "3 Bulan": {
                "default": [2000000, 750000, 750000]
            },
            "Reguler": {
                "Administrasi Perkantoran": [700000, 700000],
                "Desain Grafis": [1050000, 1050000],
                "AutoCAD": [1050000, 1050000],
                "Web Programming": [1400000, 1400000],
                "Video Editing": [1050000, 1050000],
                "Digital Marketing": [700000, 700000]
            }
        };

        // Ambil elemen input hidden
        const idPendaftaranElem = document.getElementById('id_pendaftaran');
        const jenis = idPendaftaranElem.getAttribute('data-nama_paket');
        const jurusan = idPendaftaranElem.getAttribute('data-jurusan');
        const jumlahCicilan = parseInt(idPendaftaranElem.getAttribute('data-jumlah_cicilan')) || 0;
        const cicilanKe = jumlahCicilan + 1;

        // Update field cicilan ke
        document.getElementById('cicilan_ke').value = cicilanKe;

        // Ambil array cicilan sesuai paket dan jurusan
        const cicilanArray =
            (paketCicilan[jenis] && (paketCicilan[jenis][jurusan] || paketCicilan[jenis]['default'])) || [];

        // Hitung jumlah bayar sesuai cicilan ke
        let jumlahBayar = 0;
        if (cicilanKe >= 1 && cicilanKe <= cicilanArray.length) {
            jumlahBayar = cicilanArray[cicilanKe - 1];
        }

        // Format Rupiah
        const formatRupiah = (num) => {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(num);
        };

        // Tampilkan rincian cicilan
        let rincian = "<strong>Cicilan:</strong><br>" + cicilanArray.map((val, idx) => `Cicilan ${idx + 1} : ${formatRupiah(val)}`).join('<br>');
        document.getElementById('cicilan-info').innerHTML = rincian;

        // Isi jumlah bayar jika kosong (agar tidak override input user)
        const jumlahBayarInput = document.getElementById('jumlah_bayar');
        if (!jumlahBayarInput.value) {
            jumlahBayarInput.value = jumlahBayar;
        }
    });
</script>
@stop