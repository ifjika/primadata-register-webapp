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

<form action="{{ url('user/berkas/' . $berkas->id_berkas) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="id_pendaftaran">Pendaftaran</label>
        <select name="id_pendaftaran" id="id_pendaftaran" class="form-control" required>
            <option value="">-- Pilih Pendaftar --</option>
            @foreach ($pendaftaran as $p)
            <option value="{{ $p->id_pendaftaran }}"
                data-id-peserta="{{ $p->id_peserta }}"
                data-id-user="{{ $p->peserta->id_user ?? '' }}"
                {{ old('id_pendaftaran', $berkas->id_pendaftaran ?? '') == $p->id_pendaftaran ? 'selected' : '' }}>
                ID: {{ $p->id_pendaftaran }} - {{ $p->peserta->nama_peserta ?? '-' }}
            </option>
            @endforeach
        </select>
    </div>

    {{-- ID User yang akan otomatis terisi --}}
    <div class="form-group">
        <label for="id_user">ID User</label>
        <input type="text" name="id_user" id="id_user"
            class="form-control" readonly required
            value="{{ old('id_user', $berkas->id_user ?? '') }}">
    </div>

    @php
    if (!function_exists('isImage')) {
    function isImage($filename) {
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    return in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp']);
    }
    }
    @endphp


    {{-- Ijazah --}}
    <div class="form-group">
        <label for="ijazah">Ijazah (PDF / Gambar)</label><br>
        @if($berkas->ijazah)
        @if(isImage($berkas->ijazah))
        <img src="{{ asset('storage/' . $berkas->ijazah) }}" alt="Ijazah" style="max-width: 150px;"><br>
        @else
        <a href="{{ asset('storage/' . $berkas->ijazah) }}" target="_blank">File saat ini</a><br>
        @endif
        @endif
        <input type="file" name="ijazah" class="form-control-file">
        <small>Kosongkan jika tidak ingin mengganti file</small>
    </div>

    {{-- KK --}}
    <div class="form-group">
        <label for="kk">Kartu Keluarga (PDF / Gambar)</label><br>
        @if($berkas->kk)
        @if(isImage($berkas->kk))
        <img src="{{ asset('storage/' . $berkas->kk) }}" alt="KK" style="max-width: 150px;"><br>
        @else
        <a href="{{ asset('storage/' . $berkas->kk) }}" target="_blank">File saat ini</a><br>
        @endif
        @endif
        <input type="file" name="kk" class="form-control-file">
        <small>Kosongkan jika tidak ingin mengganti file</small>
    </div>

    {{-- KTP --}}
    <div class="form-group">
        <label for="ktp">KTP (PDF / Gambar)</label><br>
        @if($berkas->ktp)
        @if(isImage($berkas->ktp))
        <img src="{{ asset('storage/' . $berkas->ktp) }}" alt="KTP" style="max-width: 150px;"><br>
        @else
        <a href="{{ asset('storage/' . $berkas->ktp) }}" target="_blank">File saat ini</a><br>
        @endif
        @endif
        <input type="file" name="ktp" class="form-control-file">
        <small>Kosongkan jika tidak ingin mengganti file</small>
    </div>

    {{-- Pas Foto --}}
    <div class="form-group">
        <label for="pas_foto">Pas Foto (JPG / PNG)</label><br>
        @if($berkas->pas_foto)
        @if(isImage($berkas->pas_foto))
        <img src="{{ asset('storage/' . $berkas->pas_foto) }}" alt="Pas Foto" style="max-width: 150px;"><br>
        @else
        <a href="{{ asset('storage/' . $berkas->pas_foto) }}" target="_blank">File saat ini</a><br>
        @endif
        @endif
        <input type="file" name="pas_foto" class="form-control-file">
        <small>Kosongkan jika tidak ingin mengganti file</small>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ url('user/berkas') }}" class="btn btn-secondary">Kembali</a>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const pesertaSelect = document.getElementById('id_peserta');
        const idUserInput = document.getElementById('id_user');

        const selectedOption = pesertaSelect.options[pesertaSelect.selectedIndex];
        const initialIdUser = selectedOption?.getAttribute('data-id-user');
        if (initialIdUser) {
            idUserInput.value = initialIdUser;
        }

        pesertaSelect.addEventListener('change', function() {
            const selected = this.options[this.selectedIndex];
            const userId = selected.getAttribute('data-id-user');
            idUserInput.value = userId ?? '';
        });
    });
</script>
@stop