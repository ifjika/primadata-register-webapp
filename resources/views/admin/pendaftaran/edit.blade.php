@extends('adminlte::page')

@section('title', 'Edit Pendaftaran')

@section('content_header')
<h1>Edit Pendaftaran</h1>
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

<form action="{{ route('admin.pendaftaran.update', $pendaftaran->id_pendaftaran) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="id_peserta">Peserta</label>
        <select name="id_peserta" class="form-control" required>
            <option value="">-- Pilih Peserta --</option>
            @foreach ($pesertas as $peserta)
            <option value="{{ $peserta->id_peserta }}"
                {{ (old('id_peserta') ?? $pendaftaran->id_peserta) == $peserta->id_peserta ? 'selected' : '' }}>
                {{ $peserta->nama_peserta }} ({{ $peserta->nik_ktp }})
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="id_paket">Paket</label>
        <select name="id_paket" class="form-control" required>
            <option value="">-- Pilih Paket --</option>
            @foreach ($pakets as $paket)
            <option value="{{ $paket->id_paket }}"
                {{ (old('id_paket') ?? $pendaftaran->id_paket) == $paket->id_paket ? 'selected' : '' }}>
                {{ $paket->nama_paket }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control" required>
            <option value="">-- Pilih Status --</option>
            <option value="menunggu" {{ (old('status') ?? $pendaftaran->status) == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
            <option value="sukses" {{ (old('status') ?? $pendaftaran->status) == 'sukses' ? 'selected' : '' }}>Sukses</option>
            <option value="batal" {{ (old('status') ?? $pendaftaran->status) == 'batal' ? 'selected' : '' }}>Batal</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('admin.pendaftaran.index') }}" class="btn btn-secondary">Kembali</a>
</form>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop