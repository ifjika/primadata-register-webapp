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
            <th>Ijazah</th>
            <th>KK</th>
            <th>KTP</th>
            <th>Pas Foto</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($berkas as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>

            <td>
                <a href="{{ asset('storage/' . $item->ijazah) }}" target="_blank">
                    <img src="{{ asset('storage/' . $item->ijazah) }}" alt="Ijazah" style="max-width: 100px; max-height: 100px; object-fit: contain;">
                </a>
            </td>

            <td>
                <a href="{{ asset('storage/' . $item->kk) }}" target="_blank">
                    <img src="{{ asset('storage/' . $item->kk) }}" alt="KK" style="max-width: 100px; max-height: 100px; object-fit: contain;">
                </a>
            </td>

            <td>
                <a href="{{ asset('storage/' . $item->ktp) }}" target="_blank">
                    <img src="{{ asset('storage/' . $item->ktp) }}" alt="KTP" style="max-width: 100px; max-height: 100px; object-fit: contain;">
                </a>
            </td>

            <td>
                <a href="{{ asset('storage/' . $item->pas_foto) }}" target="_blank">
                    <img src="{{ asset('storage/' . $item->pas_foto) }}" alt="Pas Foto" style="max-width: 100px; max-height: 100px; object-fit: contain;">
                </a>
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