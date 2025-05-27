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
    </style>
</head>

<body>
    <h2>Laporan Keuangan - Periode {{ $laporan->periode }}</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peserta</th>
                <th>Program</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayarans as $index => $pembayaran)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pembayaran->pendaftaran->peserta->nama_peserta ?? '-' }}</td>
                <td>{{ $pembayaran->pendaftaran->paket->nama_paket ?? '-' }}</td>
                <td>{{ $pembayaran->pendaftaran->paket->jurusan ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>