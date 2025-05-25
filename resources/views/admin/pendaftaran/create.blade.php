@extends('adminlte::page')

@section('title', 'Tambah Pendaftaran')

@section('content_header')
<h1>Tambah Pendaftaran Baru</h1>
@stop

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Oops!</strong> Ada kesalahan saat input data.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.pendaftaran.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="id_peserta">Peserta</label>
        <select name="id_peserta" class="form-control" required>
            <option value="">-- Pilih Peserta --</option>
            @foreach ($pesertas as $peserta)
            <option value="{{ $peserta->id_peserta }}">{{ $peserta->nama_peserta }} ({{ $peserta->nik_ktp }})</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="id_paket">Paket</label>
        <select name="id_paket" class="form-control" required>
            <option value="">-- Pilih Paket --</option>
            @foreach ($pakets as $paket)
            <option value="{{ $paket->id_paket }}">{{ $paket->nama_paket }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control" required>
            <option value="">-- Pilih Status --</option>
            <option value="menunggu" {{ old('status') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
            <option value="sukses" {{ old('status') == 'sukses' ? 'selected' : '' }}>Sukses</option>
            <option value="batal" {{ old('status') == 'batal' ? 'selected' : '' }}>Batal</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.pendaftaran.index') }}" class="btn btn-secondary">Kembali</a>
</form>

@stop