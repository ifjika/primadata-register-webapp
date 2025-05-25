@extends('adminlte::page')

@section('title', 'Pilih Paket & Jurusan')

@section('content_header')
<h1>Pendaftaran - Pilih Paket & Jurusan</h1>
@stop

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Oops!</strong> Ada kesalahan saat input data.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{{-- Tampilkan info peserta sementara --}}
<p><strong>Nama Peserta:</strong> {{ $peserta['nama_peserta'] }}</p>
<p><strong>NIK:</strong> {{ $peserta['nik_ktp'] }}</p>

<form action="{{ route('admin.pendaftaran.paket.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="jenis_paket">Jenis Paket</label>
        <select name="jenis_paket" id="jenis_paket" class="form-control" required>
            <option value="">-- Pilih Jenis Paket --</option>
            <option value="reguler">Reguler</option>
            <option value="3bulan">3 Bulan</option>
            <option value="6bulan">6 Bulan</option>
        </select>
    </div>

    <div class="form-group">
        <label for="jurusan">Jurusan</label>
        <select name="jurusan" id="jurusan" class="form-control" required>
            <option value="">-- Pilih Jurusan --</option>
        </select>
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" required>
            <option value="menunggu">Menunggu</option>
            <option value="sukses">Sukses</option>
            <option value="batal">Batal</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.pendaftaran.index') }}" class="btn btn-secondary">Batal</a>
</form>

@stop

@section('js')
<script>
    const jurusanOptions = {
        reguler: [
            "Administrasi Perkantoran",
            "Desain Grafis",
            "Digital Marketing",
            "AutoCAD",
            "Web Programmer",
            "Video Editing"
        ],
        "3bulan": [
            "APDIG",
            "APDING",
            "APDENG",
            "APSI"
        ],
        "6bulan": [
            "Administrasi Bisnis",
            "Akuntansi Perpajakan",
            "Teknik Sipil",
            "Web Programming"
        ]
    };

    document.getElementById('jenis_paket').addEventListener('change', function() {
        const selectedJenis = this.value;
        const jurusanSelect = document.getElementById('jurusan');

        // Reset jurusan options
        jurusanSelect.innerHTML = '<option value="">-- Pilih Jurusan --</option>';

        if (selectedJenis && jurusanOptions[selectedJenis]) {
            jurusanOptions[selectedJenis].forEach(j => {
                const option = document.createElement('option');
                option.value = j;
                option.text = j;
                jurusanSelect.appendChild(option);
            });
        }
    });
</script>
@endsection