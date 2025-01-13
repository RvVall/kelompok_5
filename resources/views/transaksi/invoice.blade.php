<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        h3 {
            text-align: center;
        }
        .invoice-header {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

    <div class="invoice-header">
        <h3>Invoice Transaksi</h3>
        <p><strong>Nama Pasien:</strong> {{ $transaksi->pasien->nama }}</p>
        <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d-m-Y') }}</p>
    </div>

    <table>
        <tr>
            <th>Obat</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total Harga</th>
        </tr>
        @foreach($transaksi->obats as $obat)
        <tr>
            <td>{{ $obat->nama_obat }}</td>
            <td>{{ $obat->pivot->jumlah }}</td>
            <td>Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
            <td>Rp {{ number_format($obat->harga * $obat->pivot->jumlah, 0, ',', '.') }}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3" align="right"><strong>Total Harga</strong></td>
            <td><strong>Rp {{ number_format($total_harga, 0, ',', '.') }}</strong></td>
        </tr>
    </table>

</body>
</html>
