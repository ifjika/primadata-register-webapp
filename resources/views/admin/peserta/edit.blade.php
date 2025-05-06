@extends('adminlte::page')

@section('title', 'Edit Peserta')

@section('content_header')
<h1>Edit Peserta</h1>
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

<form action="{{ route('admin.peserta.update', $peserta->id_peserta) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="id_user">ID User</label>
        <input type="number" name="id_user" class="form-control" value="{{ old('id_user', $peserta->id_user) }}" required>
    </div>

    <div class="form-group">
        <label for="nama_peserta">Nama Peserta</label>
        <input type="text" name="nama_peserta" class="form-control" value="{{ old('nama_peserta', $peserta->nama_peserta) }}" required>
    </div>

    <div class="form-group">
        <label for="nik_ktp">NIK KTP</label>
        <input type="text" name="nik_ktp" class="form-control" value="{{ old('nik_ktp', $peserta->nik_ktp) }}" required>
    </div>

    <div class="form-group">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $peserta->tempat_lahir) }}" required>
    </div>

    <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $peserta->tanggal_lahir) }}" required>
    </div>

    <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control" required>
            <option value="Laki-laki" {{ old('jenis_kelamin', $peserta->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('jenis_kelamin', $peserta->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>

    <div class="form-group">
        <label for="agama">Agama</label>
        <input type="text" name="agama" class="form-control" value="{{ old('agama', $peserta->agama) }}" required>
    </div>

    <div class="form-group">
        <label for="pendidikan">Pendidikan</label>
        <input type="text" name="pendidikan" class="form-control" value="{{ old('pendidikan', $peserta->pendidikan) }}" required>
    </div>

    <div class="form-group">
        <label for="no_wa">No. WA</label>
        <input type="text" name="no_wa" class="form-control" value="{{ old('no_wa', $peserta->no_wa) }}" required>
    </div>

    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea name="alamat" class="form-control" required>{{ old('alamat', $peserta->alamat) }}</textarea>
    </div>

    <div class="form-group">
        <label for="kelurahan">Kelurahan</label>
        <textarea name="kelurahan" class="form-control" required>{{ old('kelurahan', $peserta->kelurahan) }}</textarea>
    </div>

    <div class="form-group">
        <label for="kecamatan">Kecamatan</label>
        <textarea name="kecamatan" class="form-control" required>{{ old('kecamatan', $peserta->kecamatan) }}</textarea>
    </div>

    <div class="form-group">
        <label for="kota">Kota</label>
        <textarea name="kota" class="form-control" required>{{ old('kota', $peserta->kota) }}</textarea>
    </div>

    <div class="form-group">
        <label for="provinsi">Provinsi</label>
        <textarea name="provinsi" class="form-control" required>{{ old('provinsi', $peserta->provinsi) }}</textarea>
    </div>

    <div class="form-group">
        <label for="tempat_tinggal">Tempat Tinggal</label>
        <select name="tempat_tinggal" class="form-control" required>
            @foreach (['Bersama Orang Tua','Kost','Asrama','Panti Asuhan','Lainnya'] as $option)
            <option value="{{ $option }}" {{ old('tempat_tinggal', $peserta->tempat_tinggal) == $option ? 'selected' : '' }}>{{ $option }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('admin.peserta.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Edit Peserta page loaded');
</script>