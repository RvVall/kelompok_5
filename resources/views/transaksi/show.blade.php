@extends('adminlte.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Detail Transaksi</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Transaksi</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Pasien</th>
                        <td>{{ $transaksi->pasien->nama }}</td>
                    </tr>
                    <tr>
                        <th>Obat</th>
                        <td>
                            @foreach($transaksi->obats as $obat)
                                {{ $obat->nama_obat }} <br>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>
                            @foreach($transaksi->obats as $obat)
                                {{ $obat->pivot->jumlah }} <br>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Total Harga</th>
                        <td>
                            @php
                                $total_harga = 0;
                                foreach($transaksi->obats as $obat) {
                                    $total_harga += $obat->harga * $obat->pivot->jumlah;
                                }
                            @endphp
                            Rp {{ number_format($total_harga, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d-m-Y') }}</td>
                    </tr>
                </table>

                <div class="form-group">
                    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali ke Daftar Transaksi</a>
                    <a href="{{ route('transaksi.invoice', $transaksi->id) }}" class="btn btn-primary">Export as PDF</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
