@extends('adminlte::page')

@section('title', 'Edit Paket & Jurusan')

@section('content_header')
<h1>Edit Pendaftaran - Pilih Paket & Jurusan</h1>
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
<p><strong>Nama Peserta:</strong> {{ $peserta['nama_peserta'] ?? $peserta->nama_peserta }}</p>
<p><strong>NIK:</strong> {{ $peserta['nik_ktp'] ?? $peserta->nik_ktp }}</p>

<form action="{{ route('admin.pendaftaran.paket.update', $pendaftaran->id_pendaftaran) }}" method="POST">
    @csrf
    @method('PUT')

    <select name="jenis_paket" id="jenis_paket" class="form-control" required>
        <option value="">-- Pilih Jenis Paket --</option>
        <option value="Reguler" {{ (old('jenis_paket', $selectedJenisPaket ?? $pendaftaran->jenis_paket) == 'Reguler') ? 'selected' : '' }}>Reguler</option>
        <option value="3 bulan" {{ (old('jenis_paket', $selectedJenisPaket ?? $pendaftaran->jenis_paket) == '3 bulan') ? 'selected' : '' }}>3 Bulan</option>
        <option value="6 bulan" {{ (old('jenis_paket', $selectedJenisPaket ?? $pendaftaran->jenis_paket) == '6 bulan') ? 'selected' : '' }}>6 Bulan</option>
    </select>


    <div class="form-group">
        <label for="jurusan">Jurusan</label>
        <select name="jurusan" id="jurusan" class="form-control" required>
            <option value="">-- Pilih Jurusan --</option>
            {{-- Jurusan akan diisi otomatis oleh JS --}}
        </select>
    </div>

    <input type="hidden" name="id_paket" id="id_paket" value="{{ old('id_paket', $selectedIdPaket ?? $pendaftaran->id_paket) }}">
    <input type="hidden" name="id_peserta" value="{{ $pendaftaran->id_peserta }}">

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" required>
            <option value="">-- Pilih Status --</option>
            <option value="menunggu" {{ (old('status', $pendaftaran->status) == 'menunggu') ? 'selected' : '' }}>Menunggu</option>
            <option value="sukses" {{ (old('status', $pendaftaran->status) == 'sukses') ? 'selected' : '' }}>Sukses</option>
            <option value="batal" {{ (old('status', $pendaftaran->status) == 'batal') ? 'selected' : '' }}>Batal</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('admin.pendaftaran.index') }}" class="btn btn-secondary">Batal</a>
</form>

<div id="paket-data"
    data-pakets="{{ $paketsJson }}"
    data-selected-jurusan="{{ $selectedJurusan }}"
    data-selected-jenis-paket="{{ $selectedJenisPaket }}">
</div>



@stop

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const paketDataEl = document.getElementById('paket-data');
        const paketsRaw = paketDataEl.getAttribute('data-pakets');
        const selectedJurusan = paketDataEl.getAttribute('data-selected-jurusan');
        const selectedJenisPaket = paketDataEl.getAttribute('data-selected-jenis-paket');

        let pakets = [];
        try {
            pakets = JSON.parse(paketsRaw);
        } catch (error) {
            console.error("Gagal parsing JSON:", error);
        }

        const jenisPaketSelect = document.getElementById('jenis_paket');
        const jurusanSelect = document.getElementById('jurusan');
        const idPaketInput = document.getElementById('id_paket');

        function filterJurusanByPaket(jenisPaket, jurusanTerpilih = null) {
            jurusanSelect.innerHTML = '<option value="">-- Pilih Jurusan --</option>';
            idPaketInput.value = '';

            if (!jenisPaket) return;

            const filteredPakets = pakets.filter(p => p.nama_paket.toLowerCase() === jenisPaket.toLowerCase());
            const jurusanSet = new Set();

            filteredPakets.forEach(p => {
                if (!jurusanSet.has(p.jurusan)) {
                    jurusanSet.add(p.jurusan);
                    const option = document.createElement('option');
                    option.value = p.jurusan;
                    option.textContent = p.jurusan;

                    if (p.jurusan === jurusanTerpilih) {
                        option.selected = true;
                        idPaketInput.value = p.id_paket;
                    }

                    jurusanSelect.appendChild(option);
                }
            });
        }

        jenisPaketSelect.addEventListener('change', function() {
            filterJurusanByPaket(this.value);
        });

        jurusanSelect.addEventListener('change', function() {
            const selectedJurusan = this.value;
            const selectedJenisPaket = jenisPaketSelect.value;

            if (!selectedJurusan || !selectedJenisPaket) {
                idPaketInput.value = '';
                return;
            }

            const paket = pakets.find(p =>
                p.nama_paket.toLowerCase() === selectedJenisPaket.toLowerCase() &&
                p.jurusan === selectedJurusan
            );

            idPaketInput.value = paket ? paket.id_paket : '';
        });

        // Inisialisasi saat halaman load
        if (selectedJenisPaket) {
            jenisPaketSelect.value = selectedJenisPaket;
            filterJurusanByPaket(selectedJenisPaket, selectedJurusan);
        }
    });
</script>
@endsection