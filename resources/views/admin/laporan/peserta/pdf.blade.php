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

        <!-- Print Date, Admin, and Name in the bottom-right corner -->
        <div class="bottom-right">
            <!-- Print Date Section (using PHP for current date) -->
            <p>Padang, {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM YYYY') }}</p>

            <!-- 5 Line Breaks (Empty lines) before Admin -->
            <br><br><br><br><br>

            <!-- Admin and Name Section -->
            <p><strong>Admin</strong></p>
            <p>Lora Nining Purwanti</p>
        </div>
    </div>

    <!-- Optional Bootstrap JS (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>