@extends('adminlte::page')

@section('title', 'Peserta')

@section('content_header')
    <h1>Data Pendaftaran</h1>
    <a href="{{ route('admin.peserta.create') }}" class="btn btn-primary mb-3">Tambah Peserta Baru</a>
@stop

@section('content')

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped" id="peserta-table">
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
    <script>
        console.log('Peserta page loaded');
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#peserta-table').DataTable({
                responsive: true,
                autoWidth: false,
                // Optionally you can include other features like pagination or searching here
                paging: true,        // Enables pagination
                searching: true,     // Enables searching
                ordering: true,      // Enables sorting
                lengthChange: true,  // Show the number of records per page
                pageLength: 10,      // Default number of records per page
            });
        });
    </script>
@stop
