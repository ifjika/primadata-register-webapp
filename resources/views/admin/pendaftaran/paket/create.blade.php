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
        <label for="id_paket">Pilih Paket</label>
        <select name="jenis_paket" id="jenis_paket" class="form-control" required>
            <option value="">-- Pilih Jenis Paket --</option>
            <option value="Reguler">Reguler</option>
            <option value="3 bulan">3 Bulan</option>
            <option value="6 bulan">6 Bulan</option>
        </select>
    </div>

    <div class="form-group">
        <label for="jurusan">Jurusan</label>
        <select name="jurusan" id="jurusan" class="form-control" required>
            <option value="">-- Pilih Jurusan --</option>
            {{-- Isi otomatis oleh JS --}}
        </select>
    </div>

    <input type="hidden" name="id_paket" id="id_paket" value="">

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" required>
            <option value="">-- Pilih Status --</option>
            <option value="menunggu">Menunggu</option>
            <option value="sukses">Sukses</option>
            <option value="batal">Batal</option>
        </select>
    </div>


    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.pendaftaran.index') }}" class="btn btn-secondary">Batal</a>
</form>

{{-- Simpan data paket dalam JSON untuk JavaScript --}}
<input type="hidden" id="pakets_data" value='@json($pakets)'>

@stop

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const pakets = JSON.parse(document.getElementById('pakets_data').value);
        const jenisPaketSelect = document.getElementById('jenis_paket');
        const jurusanSelect = document.getElementById('jurusan');
        const idPaketInput = document.getElementById('id_paket');

        function filterJurusanByPaket(paket) {
            jurusanSelect.innerHTML = '<option value="">-- Pilih Jurusan --</option>';
            idPaketInput.value = ''; // reset id_paket saat paket diubah

            if (!paket) return;

            const filteredPakets = pakets.filter(p => p.nama_paket.toLowerCase() === paket.toLowerCase());
            const seenJurusan = new Set();

            filteredPakets.forEach(p => {
                if (!seenJurusan.has(p.jurusan)) {
                    seenJurusan.add(p.jurusan);
                    const option = document.createElement('option');
                    option.value = p.jurusan;
                    option.textContent = p.jurusan;
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

            // Cari paket dengan nama_paket dan jurusan sesuai pilihan
            const paket = pakets.find(p =>
                p.nama_paket.toLowerCase() === selectedJenisPaket.toLowerCase() &&
                p.jurusan === selectedJurusan
            );

            if (paket) {
                idPaketInput.value = paket.id_paket;
            } else {
                idPaketInput.value = '';
            }
        });

        // Inisialisasi jurusan saat load page jika paket sudah terpilih
        filterJurusanByPaket(jenisPaketSelect.value);
    });
</script>

@endsection