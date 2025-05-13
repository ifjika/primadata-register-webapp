@extends('adminlte::page')

@section('title', 'Daftar Paket')

@section('content_header')
<h1>Daftar Paket</h1>
<a href="{{ route('admin.paket.create') }}" class="btn btn-primary mb-3">Tambah Paket Baru</a>
@stop

@section('content')

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped" id="paket-table">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>Nama Paket</th>
            <th>Jurusan</th>
            <th>Biaya (Rp)</th>
            <th>Informasi Program</th>
            <th>Materi</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pakets as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_paket }}</td>
            <td>{{ $item->jurusan }}</td>
            <td>{{ number_format($item->biaya, 0, ',', '.') }}</td>
            <td>{{ \Str::limit($item->informasi_program, 50) }}</td>
            <td>{{ \Str::limit($item->materi, 50) }}</td>
            <td>{{ \Str::limit($item->deskripsi, 50) }}</td>
            <td>
                @if ($item->gambar)
                <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Paket {{ $item->nama_paket }}" width="80" class="img-thumbnail" data-toggle="tooltip" title="Klik untuk melihat gambar lebih besar">
                @else
                <small>Tidak ada gambar</small>
                @endif
            </td>
            <td>
                <a href="{{ route('admin.paket.edit', $item->id_paket) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Edit Paket">Edit</a>
                <form action="{{ route('admin.paket.destroy', $item->id_paket) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus paket ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus Paket">Hapus</button>
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
<script>
    console.log('Paket page loaded');
</script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#paket-table').DataTable({
            responsive: true,
            autoWidth: false
        });

        // Initialize tooltips
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@stop