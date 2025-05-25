@extends('adminlte::page')

@section('title', 'Tambah Laporan')

@section('content_header')
<h1>Tambah Laporan Baru</h1>
<a href="{{ route('admin.laporan.index') }}" class="btn btn-secondary mb-3">Kembali ke Daftar Laporan</a>
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

<form action="{{ route('admin.laporan.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="periode">Periode</label>
        <input type="text" class="form-control" id="periode" name="periode" placeholder="Misal: Januari 2025" value="{{ old('periode') }}" required>
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