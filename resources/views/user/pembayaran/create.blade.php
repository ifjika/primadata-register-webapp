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

<form action="{{ route('user.pembayaran.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="id_pendaftaran">Pilih Pendaftaran</label>
        <select name="id_pendaftaran" id="id_pendaftaran" class="form-control" required>
            <option value="">-- Pilih Pendaftar --</option>
            @foreach($pendaftaran as $item)
            @php
            $jumlahCicilan = $item->pembayaran->count();
            @endphp
            <option
                value="{{ $item->id_pendaftaran }}"
                data-nama_paket="{{ $item->paket->nama_paket ?? '' }}"
                data-jurusan="{{ $item->paket->jurusan ?? '' }}"
                data-cicilan-ke="{{ $jumlahCicilan + 1 }}">
                {{ $item->peserta->nama_peserta ?? 'Peserta tidak ditemukan' }} -
                {{ $item->paket->nama_paket ?? 'Paket tidak ditemukan' }} -
                {{ $item->paket->jurusan ?? 'Paket tidak ditemukan' }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="metode_bayar">Metode Bayar</label>
        <select name="metode_bayar" id="metode_bayar" class="form-control" required>
            <option value="">-- Pilih Metode --</option>
            <option value="transfer" {{ old('metode_bayar') == 'transfer' ? 'selected' : '' }}>Transfer - 1008 02100 3036-2 - Bank Nagari - LPK Prima Data</option>
            <option value="tunai" {{ old('metode_bayar') == 'tunai' ? 'selected' : '' }}>Tunai</option>
        </select>
    </div>

    <div class="form-group">
        <label for="cicilan_ke">Cicilan Ke</label>
        <input type="text" name="cicilan_ke" id="cicilan_ke" class="form-control" readonly>
    </div>

    <div class="form-group">
        <label for="jumlah_bayar">Jumlah Bayar</label>
        <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control" value="{{ old('jumlah_bayar') }}" required>
    </div>

    <div class="form-group">
        <label for="bukti_pembayaran">Bukti Pembayaran (Opsional)</label>
        <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control-file">
    </div>

    <div class="form-group">
        <label for="status">Status Pembayaran -- Akan divalidasi Kelunasannya oleh Admin</label>
        <input type="text" name="status" id="status" class="form-control" value="Belum Lunas" readonly>
    </div>


    {{-- Submit dan kembali --}}
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('user.pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
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

    document.getElementById('id_pendaftaran').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const jenis = selectedOption.getAttribute('data-nama_paket');
        const jurusan = selectedOption.getAttribute('data-jurusan');
        const cicilanKe = parseInt(selectedOption.getAttribute('data-cicilan-ke'));

        document.getElementById('cicilan_ke').value = cicilanKe;

        let jumlahBayar = 0;
        let rincian = "<strong>Cicilan:</strong><br>";

        if (jenis) {
            const cicilanArray =
                (paketCicilan[jenis] && paketCicilan[jenis][jurusan]) ||
                (paketCicilan[jenis] && paketCicilan[jenis]['default']) || [];

            if (cicilanKe >= 1 && cicilanKe <= cicilanArray.length) {
                jumlahBayar = cicilanArray[cicilanKe - 1];
            }

            // Format ke Rupiah
            const formatRupiah = (num) => {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(num);
            };

            rincian += cicilanArray.map((val, idx) => `Cicilan ${idx + 1} : ${formatRupiah(val)}`).join('<br>');
        }

        document.getElementById('jumlah_bayar').value = jumlahBayar;
        document.getElementById('cicilan-info').innerHTML = rincian;
    });
</script>
@stop