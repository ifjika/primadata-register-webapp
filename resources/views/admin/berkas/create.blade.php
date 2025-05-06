@extends('adminlte::page')

@section('title', 'Tambah Berkas')

@section('content_header')
<h1>Tambah Berkas Baru</h1>
@stop

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Terjadi Kesalahan!</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ url('admin/berkas') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="id_user">ID User</label>
        <input type="number" name="id_user" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="ijazah">Ijazah (PDF / Gambar)</label>
        <input type="file" name="ijazah" class="form-control-file" required>
    </div>

    <div class="form-group">
        <label for="kk">Kartu Keluarga (PDF / Gambar)</label>
        <input type="file" name="kk" class="form-control-file" required>
    </div>

    <div class="form-group">
        <label for="ktp">KTP (PDF / Gambar)</label>
        <input type="file" name="ktp" class="form-control-file" required>
    </div>

    <div class="form-group">
        <label for="pas_foto">Pas Foto (JPG / PNG)</label>
        <input type="file" name="pas_foto" class="form-control-file" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ url('admin/berkas') }}" class="btn btn-secondary">Kembali</a>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Create Berkas page loaded');
</script>
@stop