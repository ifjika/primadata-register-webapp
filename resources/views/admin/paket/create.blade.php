@extends('adminlte::page')

@section('title', 'Tambah Paket')

@section('content_header')
<h1>Tambah Paket</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.paket.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama_paket">Paket</label>
                <input type="text" name="nama_paket" id="nama_paket" class="form-control @error('nama_paket') is-invalid @enderror" value="{{ old('nama_paket') }}" required>
                @error('nama_paket')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" class="form-control @error('jurusan') is-invalid @enderror" value="{{ old('jurusan') }}" required>
                @error('jurusan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="biaya">Biaya</label>
                <input type="number" name="biaya" id="biaya" class="form-control @error('biaya') is-invalid @enderror" value="{{ old('biaya') }}" required>
                @error('biaya')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="informasi_program">Informasi Program</label>
                <div id="informasi-program-wrapper">
                    <div class="input-group mb-2 informasi-program-item">
                        <input type="text" name="informasi_program[]" class="form-control @error('informasi_program') is-invalid @enderror" value="{{ old('informasi_program.0') }}" required>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-success btn-add">+</button>
                        </div>
                    </div>
                </div>
                <small class="form-text text-muted">Maksimal 4 baris</small>
                @error('informasi_program')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="materi">Materi</label>
                <div id="materi-wrapper">
                    <div class="input-group mb-2 materi-item">
                        <input type="text" name="materi[]" class="form-control @error('materi') is-invalid @enderror" value="{{ old('materi.0') }}" required>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-success btn-add-materi">+</button>
                        </div>
                    </div>
                </div>
                <small class="form-text text-muted">Maksimal 9 baris</small>
                @error('materi')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan Paket</button>
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
        // Script jurusan tetap ada...
        const maxFields = 4;
        const wrapper = document.getElementById('informasi-program-wrapper');

        wrapper.addEventListener('click', function(e) {
            if (e.target.classList.contains('btn-add')) {
                const items = wrapper.querySelectorAll('.informasi-program-item');
                if (items.length < maxFields) {
                    const newItem = items[0].cloneNode(true);
                    const input = newItem.querySelector('input');
                    input.value = '';
                    wrapper.appendChild(newItem);
                }
            }
        });

        // Script untuk field materi
        const maxMateri = 9;
        const materiWrapper = document.getElementById('materi-wrapper');

        materiWrapper.addEventListener('click', function(e) {
            if (e.target.classList.contains('btn-add-materi')) {
                const materiItems = materiWrapper.querySelectorAll('.materi-item');
                if (materiItems.length < maxMateri) {
                    const newItem = materiItems[0].cloneNode(true);
                    const input = newItem.querySelector('input');
                    input.value = '';
                    materiWrapper.appendChild(newItem);
                }
            }
        });

    });
</script>
@stop