@extends('adminlte::page')

@section('title', 'Berkas')

@section('content_header')
<a href="{{ route('admin.berkas.create') }}" class="btn btn-primary mb-3">Create Berkas Baru</a>
@stop

@section('content')
<table class="table table-bordered table-striped table-hover" id="berkas-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Peserta</th>
            <th>Paket</th>
            <th>Jurusan</th>
            <th>Ijazah</th>
            <th>KK</th>
            <th>KTP</th>
            <th>Pas Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php use Illuminate\Support\Str; @endphp

        @foreach ($berkas as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->user->peserta->nama_peserta ?? '-' }}</td>
            <td>{{ $item->pendaftaran->paket->nama_paket ?? '-' }}</td>
            <td>{{ $item->pendaftaran->paket->jurusan ?? '-' }}</td>

            {{-- Ijazah --}}
            <td>
                @if ($item->ijazah)
                @if (Str::endsWith($item->ijazah, '.pdf'))
                <a href="{{ asset('storage/' . $item->ijazah) }}" target="_blank">Lihat PDF</a>
                @else
                <a href="{{ asset('storage/' . $item->ijazah) }}" target="_blank">
                    <img src="{{ asset('storage/' . $item->ijazah) }}" alt="Ijazah" style="max-width: 100px; max-height: 100px; object-fit: contain;">
                </a>
                @endif
                @else
                -
                @endif
            </td>

            {{-- KK --}}
            <td>
                @if ($item->kk)
                @if (Str::endsWith($item->kk, '.pdf'))
                <a href="{{ asset('storage/' . $item->kk) }}" target="_blank">Lihat PDF</a>
                @else
                <a href="{{ asset('storage/' . $item->kk) }}" target="_blank">
                    <img src="{{ asset('storage/' . $item->kk) }}" alt="KK" style="max-width: 100px; max-height: 100px; object-fit: contain;">
                </a>
                @endif
                @else
                -
                @endif
            </td>

            {{-- KTP --}}
            <td>
                @if ($item->ktp)
                @if (Str::endsWith($item->ktp, '.pdf'))
                <a href="{{ asset('storage/' . $item->ktp) }}" target="_blank">Lihat PDF</a>
                @else
                <a href="{{ asset('storage/' . $item->ktp) }}" target="_blank">
                    <img src="{{ asset('storage/' . $item->ktp) }}" alt="KTP" style="max-width: 100px; max-height: 100px; object-fit: contain;">
                </a>
                @endif
                @else
                -
                @endif
            </td>

            {{-- Pas Foto --}}
            <td>
                @if ($item->pas_foto)
                @if (Str::endsWith($item->pas_foto, '.pdf'))
                <a href="{{ asset('storage/' . $item->pas_foto) }}" target="_blank">Lihat PDF</a>
                @else
                <a href="{{ asset('storage/' . $item->pas_foto) }}" target="_blank">
                    <img src="{{ asset('storage/' . $item->pas_foto) }}" alt="Pas Foto" style="max-width: 100px; max-height: 100px; object-fit: contain;">
                </a>
                @endif
                @else
                -
                @endif
            </td>

            {{-- Tombol Aksi --}}
            <td>
                <a href="{{ route('admin.berkas.edit', $item->id_berkas) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Edit berkas">Edit</a>
                <form action="{{ route('admin.berkas.destroy', $item->id_berkas) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus berkas ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus berkas">Hapus</button>
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
        $('#berkas-table').DataTable({
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