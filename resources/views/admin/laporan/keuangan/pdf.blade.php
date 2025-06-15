<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Keuangan {{ $laporan->periode }}</title>
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
    </style>
</head>

<body>
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
</body>

</html>