@extends('adminlte::page')

@section('title', 'Edit Pembayaran')

@section('content_header')
<h1>Edit Pembayaran</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.pembayaran.update', $pembayaran->id_pembayaran) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- ID Pendaftaran --}}
            <div class="form-group">
                <label for="id_pendaftaran">ID Pendaftaran</label>
                <input type="text" id="id_pendaftaran" class="form-control" value="{{ $pembayaran->id_pendaftaran ?? '-' }}" disabled>
                <input type="hidden" name="id_pendaftaran" value="{{ $pembayaran->id_pendaftaran }}">
            </div>


            {{-- Nama Peserta (readonly) --}}
            <div class="form-group">
                <label for="nama_peserta">Nama Peserta</label>
                <input type="text" id="nama_peserta" class="form-control" value="{{ $pembayaran->pendaftaran->peserta->nama_peserta ?? '-' }}" readonly>
            </div>

            {{-- Metode Bayar --}}
            <div class="form-group">
                <select name="metode_bayar" id="metode_bayar" class="form-control" required>
                    @foreach ($enumValuesMetode as $method)
                    <option value="{{ $method }}" {{ old('metode_bayar', $pembayaran->metode_bayar) == $method ? 'selected' : '' }}>
                        {{ ucfirst($method) }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- Jumlah Bayar --}}
            <div class="form-group">
                <label for="jumlah_bayar">Jumlah Bayar (Rp)</label>
                <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control @error('jumlah_bayar') is-invalid @enderror" value="{{ old('jumlah_bayar', $pembayaran->jumlah_bayar) }}" required>
                @error('jumlah_bayar')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Bukti Pembayaran --}}
            <div class="form-group">
                <label for="bukti_pembayaran">Bukti Pembayaran</label><br>
                @if ($pembayaran->bukti_pembayaran)
                <img src="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="img-thumbnail mb-2" style="max-width: 200px;">
                @endif
                <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control-file @error('bukti_pembayaran') is-invalid @enderror" accept="image/*">
                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah bukti pembayaran.</small>
                @error('bukti_pembayaran')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            {{-- Status --}}
            <div class="form-group">
                <select name="status" id="status" class="form-control" required>
                    @foreach ($enumValuesStatus as $status)
                    <option value="{{ $status }}" {{ old('status', $pembayaran->status) == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- Submit dan kembali --}}
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Pembayaran</button>
                <a href="{{ route('admin.pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
            </div>

        </form>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop