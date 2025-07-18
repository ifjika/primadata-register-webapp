@extends('adminlte::page')

@section('title', 'Tambah Pembayaran')

@section('content_header')
<h1>Tambah Pembayaran</h1>
@stop

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.pembayaran.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Pilih Pendaftaran --}}
    <div class="form-group">
        <label for="id_pendaftaran">Pilih Pendaftar</label>
        <select name="id_pendaftaran" id="id_pendaftaran" class="form-control" required>
            <option value="">-- Pilih Pendaftar --</option>
            @foreach($pendaftaran as $item)
            @php
            $jumlahCicilan = $item->pembayaran->count();
            $selected = old('id_pendaftaran') == $item->id_pendaftaran ? 'selected' : '';
            @endphp
            <option
                value="{{ $item->id_pendaftaran }}"
                data-nama_paket="{{ $item->paket->nama_paket ?? '' }}"
                data-jurusan="{{ $item->paket->jurusan ?? '' }}"
                data-cicilan-ke="{{ $jumlahCicilan + 1 }}"
                {{ $selected }}>
                {{ $item->peserta->nama_peserta ?? 'Peserta tidak ditemukan' }} -
                {{ $item->paket->nama_paket ?? 'Paket tidak ditemukan' }} -
                {{ $item->paket->jurusan ?? 'Jurusan tidak ditemukan' }}
            </option>
            @endforeach
        </select>
    </div>

    {{-- Metode Bayar --}}
    <div class="form-group">
        <label for="metode_bayar">Metode Bayar</label>
        <select name="metode_bayar" id="metode_bayar" class="form-control" required>
            <option value="">-- Pilih Metode --</option>
            <option value="transfer" {{ old('metode_bayar') == 'transfer' ? 'selected' : '' }}>Transfer</option>
            <option value="tunai" {{ old('metode_bayar') == 'tunai' ? 'selected' : '' }}>Tunai</option>
        </select>
    </div>

    {{-- Cicilan Ke --}}
    <div class="form-group">
        <label for="cicilan_ke">Cicilan Ke</label>
        <input type="number" name="cicilan_ke" id="cicilan_ke" class="form-control" value="{{ old('cicilan_ke') }}" readonly>
        <div id="cicilan-info" class="mt-2 text-muted"></div>
    </div>

    {{-- Jumlah Bayar --}}
    <div class="form-group">
        <label for="jumlah_bayar">Jumlah Bayar</label>
        <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control" value="{{ old('jumlah_bayar') }}" required>
    </div>

    {{-- Bukti Pembayaran --}}
    <div class="form-group">
        <label for="bukti_pembayaran">Bukti Pembayaran (Opsional)</label>
        <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control-file" accept="image/*">
    </div>

    {{-- Status Pembayaran --}}
    <div class="form-group">
        <label for="status">Status Pembayaran</label>
        <select name="status" id="status" class="form-control" required>
            <option value="" disabled {{ old('status') ? '' : 'selected' }}>-- Pilih Status --</option>
            <option value="Lunas" {{ old('status') == 'Lunas' ? 'selected' : '' }}>Lunas</option>
            <option value="Belum Lunas" {{ old('status') == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas</option>
        </select>
    </div>

    {{-- Tombol --}}
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
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

    document.addEventListener('DOMContentLoaded', function() {
        const pendaftaranSelect = document.getElementById('id_pendaftaran');
        const cicilanKeInput = document.getElementById('cicilan_ke');
        const jumlahBayarInput = document.getElementById('jumlah_bayar');
        const rincianElem = document.getElementById('cicilan-info');

        const formatRupiah = (num) => {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(num);
        };

        pendaftaranSelect.addEventListener('change', function() {
            const selected = this.options[this.selectedIndex];
            const jenis = selected.getAttribute('data-nama_paket');
            const jurusan = selected.getAttribute('data-jurusan');
            const cicilanKe = parseInt(selected.getAttribute('data-cicilan-ke')) || 1;

            cicilanKeInput.value = cicilanKe;

            const cicilanArray =
                (paketCicilan[jenis] && paketCicilan[jenis][jurusan]) ||
                (paketCicilan[jenis] && paketCicilan[jenis]['default']) || [];

            let jumlahBayar = 0;
            if (cicilanKe >= 1 && cicilanKe <= cicilanArray.length) {
                jumlahBayar = cicilanArray[cicilanKe - 1];
            }

            jumlahBayarInput.value = jumlahBayar;

            // Rincian
            rincianElem.innerHTML = "<strong>Rincian Cicilan:</strong><br>" +
                cicilanArray.map((val, idx) => `Cicilan ${idx + 1}: ${formatRupiah(val)}`).join('<br>');
        });

        // Trigger perubahan jika ada value terpilih (untuk old() support)
        if (pendaftaranSelect.value) {
            const event = new Event('change');
            pendaftaranSelect.dispatchEvent(event);
        }
    });
</script>
@stop