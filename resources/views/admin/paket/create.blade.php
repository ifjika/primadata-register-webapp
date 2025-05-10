@extends('adminlte::page')

@section('title', 'Tambah Paket')

@section('content_header')
<h1>Tambah Paket</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.paket.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama_paket">Nama Paket</label>
                <input type="text" name="nama_paket" id="nama_paket" class="form-control @error('nama_paket') is-invalid @enderror" value="{{ old('nama_paket') }}" required>
                @error('nama_paket')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" class="form-control @error('jurusan') is-invalid @enderror" value="{{ old('jurusan') }}" required>
                @error('jurusan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="biaya">Biaya</label>
                <input type="number" name="biaya" id="biaya" class="form-control @error('biaya') is-invalid @enderror" value="{{ old('biaya') }}" required>
                @error('biaya')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan Paket</button>
                <a href="{{ route('admin.paket.index') }}" class="btn btn-secondary">Kembali</a>
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
    console.log('Create Paket Page Loaded');
</script>
@stop