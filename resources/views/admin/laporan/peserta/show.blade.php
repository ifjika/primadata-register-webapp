@extends('adminlte::page')

@section('title', 'Detail Laporan')

@section('content_header')
<h1>Detail Laporan Periode {{ $laporan->periode }}</h1>
@stop

@section('content')
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Peserta</th>
            <th>Program</th>
            <th>Jurusan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pembayarans as $index => $pembayaran)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $pembayaran->pendaftaran->peserta->nama_peserta ?? '-' }}</td>
            <td>{{ $pembayaran->pendaftaran->paket->nama_paket ?? '-'}}</td>
            <td>{{ $pembayaran->pendaftaran->paket->jurusan ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('admin.laporan.peserta.cetak', $laporan->id_laporan) }}" class="btn btn-danger mb-3" target="_blank">
    <i class="fas fa-file-pdf"></i> Cetak PDF
</a>
<a href="{{ route('admin.laporan.keuangan.index') }}" class="btn btn-secondary mb-3">Kembali</a>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#detail-laporan-table').DataTable({
            responsive: true,
            autoWidth: false
        });
    });
</script>
@stop