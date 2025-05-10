@extends('adminlte::page')

@section('title', 'Laporan')

@section('content_header')
<h1>Laporan Keuangan</h1>
<a href="{{ route('admin.laporan.create') }}" class="btn btn-primary mb-3">Tambah Laporan Baru</a>
@stop

@section('content')
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped" id="laporan-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Periode</th>
            <th>Jumlah Peserta</th>
            <th>Omset</th>
            <th>Dibuat Pada</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($laporan as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->periode }}</td>
            <td>{{ $item->jumlah_peserta }}</td>
            <td>Rp {{ number_format($item->omset, 0, ',', '.') }}</td>
            <td>{{ $item->created_at->format('d-m-Y') }}</td>
            <td>
                <a href="{{ route('admin.laporan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('laporan.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus laporan ini?')">Hapus</button>
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
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#laporan-table').DataTable({
            responsive: true,
            autoWidth: false
        });
    });
</script>
@stop