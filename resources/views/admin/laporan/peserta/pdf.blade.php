<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peserta {{ $laporan->periode }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
        }

        h2 {
            text-align: center;
        }

        tfoot td {
            font-weight: bold;
            background-color: #f0f0f0;
            border: 1px solid black;
        }

        .signature-container {
            position: relative;
            min-height: 100vh;
            /* Ensure full height of page */
        }

        /* Bottom-right positioning for Print Date, Admin, and Name */
        .bottom-right {
            position: absolute;
            right: 20px;
            bottom: 20px;
            text-align: right;
        }

        .bottom-right p {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="container signature-container">
        <h2>Laporan Peserta LKP Primadata - Periode {{ \Carbon\Carbon::parse($laporan->periode . '-01')->translatedFormat('F Y') }}</h2>
        <h5>Jumlah Peserta</h5>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Program</th>
                    <th>Jurusan</th>
                    <th>Nama Peserta</th>
                    <th>Asal Kota</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembayarans as $index => $pembayaran)
                @php
                $paket = $pembayaran->pendaftaran->paket;
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pembayaran->created_at->format('d-m-Y') }}</td>
                    <td>{{ $paket->nama_paket ?? '-' }}</td>
                    <td>{{ $paket->jurusan ?? '-' }}</td>
                    <td>{{ $pembayaran->pendaftaran->peserta->nama_peserta ?? '-' }}</td>
                    <td>{{ $pembayaran->pendaftaran->peserta->tempat_lahir ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">Total Peserta</td>
                    <td>{{ $totalPeserta }}</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <h5>Jumlah Peserta per Jurusan</h5>

        @foreach ($blokPesertaData as $kategori => $jurusanData)
        <h6>Kategori: {{ ucfirst($kategori) }}</h6>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jurusan</th>
                    <th>Jumlah Peserta</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jurusanData as $jurusan => $jumlah)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $jurusan }}</td>
                    <td>{{ $jumlah }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        @endforeach

        <br><br>
        <div style="text-align: right;">
            <p>Padang, {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM YYYY') }}</p>
            <br><br><br><br><br>
            <p><strong>Admin</strong></p>
            <p>Lora Nining Purwanti</p>
        </div>
    </div>

    <!-- Optional Bootstrap JS (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>