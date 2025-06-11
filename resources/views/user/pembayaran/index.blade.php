@extends('adminlte::page')

@section('title', 'Pembayaran')

@section('content_header')
<h1>Data Pembayaran</h1>
<a href="{{ route('user.pembayaran.create') }}" class="btn btn-primary mb-3">Tambah Pembayaran</a>
@stop

@section('content')

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped" id="pembayaran-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Peserta</th>
            <th>Paket</th>
            <th>Jurusan</th>
            <th>Biaya</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pembayaran as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->pendaftaran->peserta->nama_peserta ?? '-' }}</td>
            <td>{{ $item->pendaftaran->paket->nama_paket ?? '-' }}</td>
            <td>{{ $item->pendaftaran->paket->jurusan ?? '-' }}</td>
            <td>Rp{{ number_format($item->pendaftaran->paket->biaya ?? 0, 0, ',', '.') }}</td>
            <td>
                <a href="{{ route('user.pembayaran.show', $item->id_pembayaran) }}" class="btn btn-info btn-sm">Show</a>
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
        $('#pembayaran-table').DataTable({
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