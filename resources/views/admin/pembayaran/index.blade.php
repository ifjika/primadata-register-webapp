@extends('adminlte::page')

@section('title', 'Pembayaran')

@section('content_header')
<h1>Data Pembayaran</h1>
<a href="{{ route('admin.pembayaran.create') }}" class="btn btn-primary mb-3">Tambah Pembayaran</a>
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
            <th>Metode Bayar</th>
            <th>Jumlah Bayar</th>
            <th>Bukti</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pembayaran as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->pendaftaran->peserta->nama_peserta ?? '-' }}</td>
            <td>{{ ucfirst($item->metode_bayar ?? '-' ) }}</td>
            <td>Rp{{ number_format($item->jumlah_bayar, 0, ',', '.') }}</td>
            <td>
                @if ($item->bukti_pembayaran)
                <a href="{{ asset('storage/' . $item->bukti_pembayaran) }}" target="_blank">Lihat</a>
                @else
                -
                @endif
            </td>
            <td>
                @if($item->status == 'Lunas')
                <span class="badge badge-success">Lunas</span>
                @else
                <span class="badge badge-danger">Belum Lunas</span>
                @endif
            </td>
            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
            <td>
                <a href="{{ route('admin.pembayaran.edit', $item->id_pembayaran) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('admin.pembayaran.destroy', $item->id_pembayaran) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
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