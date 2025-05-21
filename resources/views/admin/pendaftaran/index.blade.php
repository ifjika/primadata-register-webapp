@extends('adminlte::page')

@section('title', 'Pendaftaran')

@section('content_header')
<h1>Data Pendaftaran</h1>
<a href="{{ route('admin.pendaftaran.create') }}" class="btn btn-primary mb-3">Tambah Pendaftaran Baru</a>
@stop

@section('content')

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped" id="pendaftaran-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Peserta</th>
            <th>Nama Paket</th>
            <th>Tanggal Daftar</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pendaftarans as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->peserta->nama_peserta ?? '-' }}</td>
            <td>{{ $item->paket->nama_paket }}</td>
            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
            <td>{{ ucfirst($item->status) }}</td>
            <td>
                <a href="{{ route('admin.pendaftaran.edit', $item->id_pendaftaran) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.pendaftaran.destroy', $item->id_pendaftaran) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pendaftaran ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#pendaftaran-table').DataTable({
            responsive: true,
            autoWidth: false,
            paging: true,
            searching: true,
            ordering: true,
            lengthChange: true,
            pageLength: 10,
        });
    });
</script>
@stop