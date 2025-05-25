@extends('adminlte::page')

@section('title', 'Tambah Laporan')

@section('content_header')
<h1>Tambah Laporan Baru</h1>
@stop

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.laporan.keuangan.store') }}" method="POST">
    @csrf
    @php
    $bulanSekarang = now()->month;
    $namaBulan = [
    1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
    5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
    9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember',
    ];
    @endphp

    <div class="form-group">
        <label for="periode">Periode</label>
        <select class="form-control" id="periode" name="periode" required>
            <option value="" disabled selected>Pilih Bulan</option>
            @for ($i = 1; $i <= $bulanSekarang; $i++)
                <option value="{{ $namaBulan[$i] }} {{ now()->year }}"
                {{ old('periode') == $namaBulan[$i] . ' ' . now()->year ? 'selected' : '' }}>
                {{ $namaBulan[$i] }} {{ now()->year }}
                </option>
                @endfor
        </select>
    </div>


    <div class="form-group">
        <label for="jumlah_peserta">Jumlah Peserta</label>
        <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" value="{{ old('jumlah_peserta') }}" required>
    </div>

    <div class="form-group">
        <label for="omset">Omset</label>
        <input type="number" class="form-control" id="omset" name="omset" value="{{ old('omset') }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.laporan.keuangan.index') }}" class="btn btn-secondary">Kembali ke Daftar Laporan</a>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Create laporan page loaded');
</script>
@stop