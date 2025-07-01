<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan {{ $laporan->periode }}</title>
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
        <h2>Laporan Keuangan LKP Primadata - Periode {{ \Carbon\Carbon::parse($laporan->periode . '-01')->translatedFormat('F Y') }}</h2>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Program</th>
                    <th>Jurusan</th>
                    <th>Jumlah Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @php $totalPembayaran = 0; @endphp
                @foreach ($pembayarans as $index => $pembayaran)
                @php $totalPembayaran += $pembayaran->jumlah_bayar; @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pembayaran->created_at->format('d-m-Y') }}</td>
                    <td>{{ $pembayaran->pendaftaran->paket->nama_paket ?? '-' }}</td>
                    <td>{{ $pembayaran->pendaftaran->paket->jurusan ?? '-' }}</td>
                    <td>Rp {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">Total Pembayaran</td>
                    <td colspan="1">Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</td>
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