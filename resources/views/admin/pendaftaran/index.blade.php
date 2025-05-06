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
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Tanggal Pendaftaran</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendaftarans as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->telepon }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_pendaftaran)->format('d-m-Y') }}</td>
                    <td>{{ ucfirst($item->status) }}</td>
                    <td>
                        <a href="{{ route('admin.pendaftaran.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.pendaftaran.destroy', $item->id) }}" method="POST" style="display:inline;">
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
    <script>
        console.log('Pendaftaran page loaded');
    </script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#pendaftaran-table').DataTable({
                responsive: true,
                autoWidth: false
            });
        });
    </script>
@stop
