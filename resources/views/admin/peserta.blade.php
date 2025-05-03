@extends('adminlte::page')

@section('title', 'Peserta')

@section('content_header')
<a href="{{ route('admin.peserta.create') }}" class="btn btn-primary mb-3">Tambah Peserta Baru</a>
@stop

@section('content')
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Tempat, Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>No. WA</th>
            <th>Kota</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($peserta as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_peserta }}</td>
            <td>{{ $item->nik_ktp }}</td>
            <td>{{ $item->tempat_lahir }}, {{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}</td>
            <td>{{ $item->jenis_kelamin }}</td>
            <td>{{ $item->no_wa }}</td>
            <td>{{ $item->kota }}</td>
            <td>
                <a href="{{ route('admin.peserta.edit', $item->id_peserta) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.peserta.destroy', $item->id_peserta) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus peserta ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Peserta page loaded');
</script>
@stop