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
    <h2>Laporan Keuangan - Periode {{ $laporan->periode }}</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peserta</th>
                <th>Jurusan</th>
                <th>Jumlah Pembayaran</th>
                <th>Tanggal Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @php $totalPembayaran = 0; @endphp
            @foreach ($pembayarans as $index => $pembayaran)
            @php $totalPembayaran += $pembayaran->jumlah_bayar; @endphp
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pembayaran->pendaftaran->peserta->nama_peserta ?? '-' }}</td>
                <td>{{ $pembayaran->pendaftaran->paket->jurusan ?? '-' }}</td>
                <td>Rp {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}</td>
                <td>{{ $pembayaran->created_at->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total Pembayaran</td>
                <td colspan="2">Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</body>

</html>