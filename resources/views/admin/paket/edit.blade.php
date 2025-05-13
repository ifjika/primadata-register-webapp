@extends('adminlte::page')

@section('title', 'Edit Paket')

@section('content_header')
<h1>Edit Paket</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.paket.update', $paket->id_paket) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_paket">Paket</label>
                <input type="text" name="nama_paket" id="nama_paket" class="form-control @error('nama_paket') is-invalid @enderror" value="{{ old('nama_paket', $paket->nama_paket) }}" required>
                @error('nama_paket')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" class="form-control @error('jurusan') is-invalid @enderror" value="{{ old('jurusan', $paket->jurusan) }}" required>
                @error('jurusan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="biaya">Biaya</label>
                <input type="number" name="biaya" id="biaya" class="form-control @error('biaya') is-invalid @enderror" value="{{ old('biaya', $paket->biaya) }}" required>
                @error('biaya')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Informasi Program --}}
            <div class="form-group">
                <label for="informasi_program">Informasi Program</label>
                <div id="informasi-program-wrapper">
                    @php
                    $informasiList = old('informasi_program', explode("\n", $paket->informasi_program));
                    @endphp
                    @foreach ($informasiList as $index => $item)
                    <div class="input-group mb-2 informasi-program-item">
                        <input type="text" name="informasi_program[]" class="form-control @error('informasi_program') is-invalid @enderror" value="{{ $item }}" required>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-success btn-add">+</button>
                        </div>
                    </div>
                    @endforeach
                </div>
                <small class="form-text text-muted">Maksimal 4 baris</small>
                @error('informasi_program')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            {{-- Materi --}}
            <div class="form-group">
                <label for="materi">Materi</label>
                <div id="materi-wrapper">
                    @php
                    $materiList = old('materi', explode("\n", $paket->materi));
                    @endphp
                    @foreach ($materiList as $index => $item)
                    <div class="input-group mb-2 materi-item">
                        <input type="text" name="materi[]" class="form-control @error('materi') is-invalid @enderror" value="{{ $item }}" required>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-success btn-add-materi">+</button>
                        </div>
                    </div>
                    @endforeach
                </div>
                <small class="form-text text-muted">Maksimal 9 baris</small>
                @error('materi')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi', $paket->deskripsi) }}</textarea>
                @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Gambar --}}
            <div class="form-group">
                <label for="gambar">Gambar</label><br>
                @if ($paket->gambar)
                <img src="{{ asset('storage/' . $paket->gambar) }}" alt="Gambar Saat Ini" class="img-thumbnail mb-2" width="120">
                @endif
                <input type="file" name="gambar" id="gambar" class="form-control-file @error('gambar') is-invalid @enderror" accept="image/*">
                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                @error('gambar')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Paket</button>
                <a href="{{ route('admin.paket.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const maxFields = 4;
        const wrapper = document.getElementById('informasi-program-wrapper');
        wrapper.addEventListener('click', function(e) {
            if (e.target.classList.contains('btn-add')) {
                const items = wrapper.querySelectorAll('.informasi-program-item');
                if (items.length < maxFields) {
                    const newItem = items[0].cloneNode(true);
                    newItem.querySelector('input').value = '';
                    wrapper.appendChild(newItem);
                }
            }
        });

        const maxMateri = 9;
        const materiWrapper = document.getElementById('materi-wrapper');
        materiWrapper.addEventListener('click', function(e) {
            if (e.target.classList.contains('btn-add-materi')) {
                const materiItems = materiWrapper.querySelectorAll('.materi-item');
                if (materiItems.length < maxMateri) {
                    const newItem = materiItems[0].cloneNode(true);
                    newItem.querySelector('input').value = '';
                    materiWrapper.appendChild(newItem);
                }
            }
        });
    });
</script>
@stop