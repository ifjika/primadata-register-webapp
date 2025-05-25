@extends('adminlte::page')

@section('title', 'Tambah Peserta')

@section('content_header')
<h1>Tambah Peserta Baru</h1>
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

<form action="{{ route('admin.pendaftaran.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="id_user">Pilih User</label>
        <select name="id_user" class="form-control" required>
            <option value="">-- Pilih User --</option>
            @foreach($users as $user)
            <option value="{{ $user->id }}" {{ old('id_user') == $user->id ? 'selected' : '' }}>
                {{ $user->name }} (ID: {{ $user->id }})
            </option>
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <label for="nama_peserta">Nama Peserta</label>
        <input type="text" name="nama_peserta" class="form-control" value="{{ old('nama_peserta') }}" required>
    </div>

    <div class="form-group">
        <label for="nik_ktp">NIK KTP</label>
        <input
            type="text"
            inputmode="numeric"
            pattern="\d{16}"
            maxlength="16"
            name="nik_ktp"
            class="form-control"
            value="{{ old('nik_ktp') }}"
            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16);"
            required>
    </div>

    <div class="form-group">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}" required>
    </div>

    <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}" required>
    </div>

    <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control" required>
            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>

    <div class="form-group">
        <label for="agama">Agama</label>
        <input type="text" name="agama" class="form-control" value="{{ old('agama') }}" required>
    </div>

    <div class="form-group">
        <label for="pendidikan">Pendidikan</label>
        <input type="text" name="pendidikan" class="form-control" value="{{ old('pendidikan') }}" required>
    </div>

    <div class="form-group">
        <label for="no_wa">No. WA</label>
        <input
            type="text"
            inputmode="numeric"
            pattern="\d{9,13}"
            maxlength="13"
            name="no_wa"
            class="form-control"
            value="{{ old('no_wa') }}"
            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13);"
            required>
    </div>

    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea name="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
    </div>

    <div class="form-group">
        <label for="kelurahan">Kelurahan</label>
        <textarea name="kelurahan" class="form-control" required>{{ old('kelurahan') }}</textarea>
    </div>

    <div class="form-group">
        <label for="kecamatan">Kecamatan</label>
        <textarea name="kecamatan" class="form-control" required>{{ old('kecamatan') }}</textarea>
    </div>

    <div class="form-group">
        <label for="kota">Kota</label>
        <textarea name="kota" class="form-control" required>{{ old('kota') }}</textarea>
    </div>

    <div class="form-group">
        <label for="provinsi">Provinsi</label>
        <textarea name="provinsi" class="form-control" required>{{ old('provinsi') }}</textarea>
    </div>

    <div class="form-group">
        <label for="tempat_tinggal">Tempat Tinggal</label>
        <select name="tempat_tinggal" class="form-control" required>
            <option value="Bersama Orang Tua" {{ old('tempat_tinggal') == 'Bersama Orang Tua' ? 'selected' : '' }}>Bersama Orang Tua</option>
            <option value="Kost" {{ old('tempat_tinggal') == 'Kost' ? 'selected' : '' }}>Kost</option>
            <option value="Asrama" {{ old('tempat_tinggal') == 'Asrama' ? 'selected' : '' }}>Asrama</option>
            <option value="Panti Asuhan" {{ old('tempat_tinggal') == 'Panti Asuhan' ? 'selected' : '' }}>Panti Asuhan</option>
            <option value="Lainnya" {{ old('tempat_tinggal') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Berikutnya</button>
    <a href="{{ route('admin.pendaftaran.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Create Peserta page loaded');
</script>
@stop