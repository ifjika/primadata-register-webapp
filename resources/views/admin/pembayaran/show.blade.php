@extends('adminlte::page')

@section('title', 'Detail Pembayaran')

@section('content_header')
<h1>Detail Pembayaran {{ $pembayaran->pendaftaran->peserta->nama_peserta ?? '-' }}</h1>
@endsection

@php
$rolePrefix = auth()->user()->role ?? 'admin';

if (!function_exists('toRoman')) {
function toRoman($num) {
$num = (int) $num;
if ($num <= 0) return '-' ;

    $map=[ 'X'=> 10,
    'IX' => 9,
    'V' => 5,
    'IV' => 4,
    'I' => 1,
    ];

    $result = '';
    foreach ($map as $roman => $int) {
    while ($num >= $int) {
    $result .= $roman;
    $num -= $int;
    }
    }
    return $result;
    }
    }
    @endphp

    @section('content')
    <table class="table table-bordered" id="detail-pembayaran-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Cicilan</th>
                <th>Tagihan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Bukti</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayarans as $index => $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ toRoman($item->cicilan_ke ?? $loop->iteration) }}</td>
                <td>Rp{{ number_format($item->jumlah_bayar ?? 0, 0, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('d-m-Y') }}</td>
                <td>
                    @if($item->status === 'Lunas')
                    <span class="badge badge-success">Lunas</span>
                    @else
                    <span class="badge badge-danger">Belum Lunas</span>
                    @endif
                </td>
                <td>
                    @if ($item->bukti_pembayaran)
                    <img src="{{ asset('storage/' . $item->bukti_pembayaran) }}" alt="Bukti Pembayaran" width="100" height="100">
                    @else
                    -
                    @endif
                </td>
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

    <a href="{{ route($rolePrefix . '.pembayaran.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    @endsection

    @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    @endsection

    @section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#detail-pembayaran-table').DataTable({
                responsive: true,
                autoWidth: false
            });
        });
    </script>
    @endsection