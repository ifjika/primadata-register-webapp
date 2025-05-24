@extends('adminlte::page')

@section('title', 'Edit Berkas')

@section('content_header')
<h1>Edit Berkas</h1>
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

<form action="{{ url('admin/berkas/' . $berkas->id_berkas) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- Dropdown untuk pilih peserta --}}
    <div class="form-group">
        <label for="id_peserta">Pilih Peserta</label>
        <select id="id_peserta" class="form-control" required>
            <option value="">-- Pilih Peserta --</option>
            @foreach ($peserta as $p)
            <option value="{{ $p->id_peserta }}" data-id-user="{{ $p->user->id ?? '' }}"
                {{ old('id_user', $berkas->id_user) == ($p->user->id ?? '') ? 'selected' : '' }}>
                {{ $p->nama_peserta }} (ID Peserta: {{ $p->id_peserta }})
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <input type="text" name="id_user" class="form-control" value="{{ old('id_user', $berkas->id_user) }}" readonly>
    </div>
    @php
    function isImage($filename) {
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    return in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp']);
    }
    @endphp

    <div class="form-group">
        <label for="ijazah">Ijazah (PDF / Gambar)</label><br>
        @if($berkas->ijazah)
        @if(isImage($berkas->ijazah))
        <img src="{{ asset('storage/' . $berkas->ijazah) }}" alt="Ijazah" style="max-width: 150px; margin-bottom: 10px;"><br>
        @else
        <a href="{{ asset('storage/' . $berkas->ijazah) }}" target="_blank">File saat ini</a><br>
        @endif
        @endif
        <input type="file" name="ijazah" class="form-control-file">
        <small>Kosongkan jika tidak ingin mengganti file</small>
    </div>

    <div class="form-group">
        <label for="kk">Kartu Keluarga (PDF / Gambar)</label><br>
        @if($berkas->kk)
        @if(isImage($berkas->kk))
        <img src="{{ asset('storage/' . $berkas->kk) }}" alt="Kartu Keluarga" style="max-width: 150px; margin-bottom: 10px;"><br>
        @else
        <a href="{{ asset('storage/' . $berkas->kk) }}" target="_blank">File saat ini</a><br>
        @endif
        @endif
        <input type="file" name="kk" class="form-control-file">
        <small>Kosongkan jika tidak ingin mengganti file</small>
    </div>

    <div class="form-group">
        <label for="ktp">KTP (PDF / Gambar)</label><br>
        @if($berkas->ktp)
        @if(isImage($berkas->ktp))
        <img src="{{ asset('storage/' . $berkas->ktp) }}" alt="KTP" style="max-width: 150px; margin-bottom: 10px;"><br>
        @else
        <a href="{{ asset('storage/' . $berkas->ktp) }}" target="_blank">File saat ini</a><br>
        @endif
        @endif
        <input type="file" name="ktp" class="form-control-file">
        <small>Kosongkan jika tidak ingin mengganti file</small>
    </div>

    <div class="form-group">
        <label for="pas_foto">Pas Foto (JPG / PNG)</label><br>
        @if($berkas->pas_foto)
        @if(isImage($berkas->pas_foto))
        <img src="{{ asset('storage/' . $berkas->pas_foto) }}" alt="Pas Foto" style="max-width: 150px; margin-bottom: 10px;"><br>
        @else
        <a href="{{ asset('storage/' . $berkas->pas_foto) }}" target="_blank">File saat ini</a><br>
        @endif
        @endif
        <input type="file" name="pas_foto" class="form-control-file">
        <small>Kosongkan jika tidak ingin mengganti file</small>
    </div>


    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ url('admin/berkas') }}" class="btn btn-secondary">Kembali</a>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    document.getElementById('id_peserta').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const userId = selectedOption.getAttribute('data-id-user');
        document.getElementById('id_user').value = userId ?? '';
    });

    window.addEventListener('DOMContentLoaded', () => {
        const select = document.getElementById('id_peserta');
        const selectedOption = select.options[select.selectedIndex];
        document.getElementById('id_user').value = selectedOption.getAttribute('data-id-user') ?? '';
    });
</script>
@stop