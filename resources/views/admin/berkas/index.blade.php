@extends('adminlte::page')

@section('title', 'Berkas')

@section('content_header')
<a href="{{ route('admin.berkas.create') }}" class="btn btn-primary mb-3">Create Berkas Baru</a>
@stop

@section('content')
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>ID</th>
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
            <td>{{ $item->id_user }}</td>

            <td>
                <a href="{{ asset('storage/' . $item->ijazah) }}" target="_blank">
                    {{ basename($item->ijazah) }}
                </a>
            </td>

            <td>
                <a href="{{ asset('storage/' . $item->kk) }}" target="_blank">
                    {{ basename($item->kk) }}
                </a>
            </td>

            <td>
                <a href="{{ asset('storage/' . $item->ktp) }}" target="_blank">
                    {{ basename($item->ktp) }}
                </a>
            </td>

            <td>
                <a href="{{ asset('storage/' . $item->pas_foto) }}" target="_blank">
                    {{ basename($item->pas_foto) }}
                </a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Berkas page loaded');
</script>
@stop