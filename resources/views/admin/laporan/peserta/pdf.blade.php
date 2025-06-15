<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Peserta {{ $laporan->periode }}</title>
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
    </style>
</head>

<body>
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
            // Hapus ini, jangan override $totalPeserta
            // $totalPeserta = $totalPesertaGroup[$key] ?? 0;
            @endphp
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pembayaran->created_at->format('d-m-Y') }}</td>
                <td>{{ $paket->nama_paket ?? '-' }}</td>
                <td>{{ $paket->jurusan ?? '-' }}</td>
                <td>{{ $pembayaran->pendaftaran->peserta->nama_peserta ?? '-' }}</td>
                <td>{{ $pembayaran->pendaftaran->peserta->tempat_lahir ?? '-'}}</td>
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
</body>

</html>