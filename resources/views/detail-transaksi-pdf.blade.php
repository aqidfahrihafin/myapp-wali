<!DOCTYPE html>
<html>
<head>
    <title>Detail Transaksi</title>
    <style>
        body { font-family: sans-serif; }
        h2 { color: #0134d4; }
        table { width: 100%; margin-top: 20px; border-collapse: collapse; }
        td { padding: 8px; }
        .label { color: #666; width: 30%; }
    </style>
</head>
<body>
    <h2>Detail Transaksi</h2>
    <table>
        <tr>
            <td class="label">Judul</td>
            <td>{{ $transaksi['judul'] }}</td>
        </tr>
        <tr>
            <td class="label">Tanggal</td>
            <td>{{ $transaksi['created_at'] ?? $transaksi['tanggal'] }}</td>
        </tr>
        <tr>
            <td class="label">Jumlah</td>
            <td>Rp {{ number_format($transaksi['jumlah']) }}</td>
        </tr>
        <tr>
            <td class="label">Tipe</td>
            <td>{{ $transaksi['tipe'] }}</td>
        </tr>
        <tr>
            <td class="label">Keterangan</td>
            <td>{{ $transaksi['keterangan'] }}</td>
        </tr>
    </table>
</body>
</html>
