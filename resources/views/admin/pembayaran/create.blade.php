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

    <div class="form-group">
        <label for="id_pendaftaran">Pilih Pendaftaran</label>
        <select name="id_pendaftaran" id="id_pendaftaran" class="form-control" required>
            <option value="" disabled selected>-- Pilih Peserta --</option>
            @foreach($pendaftaran as $item)
            <option value="{{ $item->id_pendaftaran }}">
                {{ $item->peserta->nama_peserta ?? 'Peserta tidak ditemukan' }} - (ID: {{ $item->id_pendaftaran }})
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="metode_bayar">Metode Bayar</label>
        <select name="metode_bayar" id="metode_bayar" class="form-control" required>
            <option value="">-- Pilih Metode --</option>
            <option value="transfer" {{ old('metode_bayar') == 'transfer' ? 'selected' : '' }}>Transfer</option>
            <option value="tunai" {{ old('metode_bayar') == 'tunai' ? 'selected' : '' }}>Tunai</option>
        </select>
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
        <label for="status">Status Pembayaran</label>
        <select name="status" id="status" class="form-control" required>
            <option value="" disabled selected>-- Pilih Status --</option>
            <option value="Lunas">Lunas</option>
            <option value="Belum Lunas">Belum Lunas</option>
        </select>
    </div>

    {{-- Submit dan kembali --}}
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</form>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop