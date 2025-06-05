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
        <label for="id_pendaftaran">Pendaftaran</label>
        <select name="id_pendaftaran" id="id_pendaftaran" class="form-control" required>
            <option value="">-- Pilih Pendaftar --</option>
            @foreach ($pendaftaran as $p)
            <option value="{{ $p->id_pendaftaran }}"
                data-id-peserta="{{ $p->id_peserta }}"
                data-id-user="{{ $p->peserta->id_user ?? '' }}">
                ID: {{ $p->id_pendaftaran }} - {{ $p->peserta->nama_peserta ?? '-' }}
            </option>
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <label for="id_user">ID User</label>
        <input type="text" id="id_user" name="id_user" class="form-control" readonly required>
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
    document.addEventListener('DOMContentLoaded', function() {
        const pendaftaranSelect = document.getElementById('id_pendaftaran');
        const idUserInput = document.getElementById('id_user');

        pendaftaranSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const idUser = selectedOption.getAttribute('data-id-user');
            idUserInput.value = idUser ?? '';
        });
    });
</script>
@stop