@extends('adminlte.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Daftar Transaksi</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mb-4">
            <div class="col-sm-12 text-right">
                <a href="{{ route('transaksi.create') }}" class="btn btn-success">Tambah Transaksi</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Transaksi</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Pasien</th>
                            <th>Obat</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi as $t)
                        <tr>
                            <td>{{ $t->pasien->nama }}</td>
                            <td>
                                @foreach($t->obats as $obat)
                                    {{ $obat->nama_obat }} <br>
                                @endforeach
                            </td>
                            <td>
                                @foreach($t->obats as $obat)
                                    {{ $obat->pivot->jumlah }} <br>
                                @endforeach
                            </td>
                            <td>
                                @php
                                    $total_harga = 0;
                                    foreach($t->obats as $obat) {
                                        $total_harga += $obat->harga * $obat->pivot->jumlah;
                                    }
                                @endphp
                                Rp {{ number_format($total_harga, 2, ',', '.') }}
                            </td>
                            <td>{{ \Carbon\Carbon::parse($t->tanggal)->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('transaksi.show', $t->id) }}" class="btn btn-info btn-sm">Cetak</a>
                                <a href="{{ route('transaksi.edit', $t->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('transaksi.destroy', $t->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
