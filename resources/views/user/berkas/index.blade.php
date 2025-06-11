@extends('adminlte::page')

@section('title', 'Data Pembayaran')

@section('content_header')
<h1>Data Pembayaran Saya</h1>
@stop

@section('content')
<table class="table table-bordered table-striped table-hover" id="pembayaran-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Peserta</th>
            <th>Paket</th>
            <th>Tanggal Pembayaran</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pembayaran as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->pendaftaran->peserta->nama_peserta ?? '-' }}</td>
            <td>{{ $item->pendaftaran->paket->nama_paket ?? '-' }}</td>
            <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
            <td>{{ $item->status ?? '-' }}</td>
            <td>
                <a href="{{ route('admin.pembayaran.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.pembayaran.destroy', $item->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
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