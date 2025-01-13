@extends('adminlte.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Tambah Transaksi</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <!-- Dropdown Pasien -->
                    <div class="form-group">
                        <label for="pasien_id">Nama Pasien</label>
                        <select name="pasien_id" id="pasien_id" class="form-control" required>
                            @foreach($pasiens as $pasien)
                                <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Input Obat dan Jumlah -->
                    <div class="form-group">
                        <label>Obat</label>
                        <div id="obat-container">
                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <select name="obat_id[]" class="form-control" required>
                                        @foreach($obats as $obat)
                                            <option value="{{ $obat->id }}">{{ $obat->nama_obat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" required>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-success btn-add-obat">+</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Input Tanggal -->
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                    </div>

                    <!-- Tombol Simpan -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Event listener untuk tombol tambah obat
        document.querySelector('.btn-add-obat').addEventListener('click', function () {
            const container = document.querySelector('#obat-container');
            const row = document.createElement('div');
            row.classList.add('row', 'mb-2');

            row.innerHTML = `
                <div class="col-md-5">
                    <select name="obat_id[]" class="form-control" required>
                        @foreach($obats as $obat)
                            <option value="{{ $obat->id }}">{{ $obat->nama_obat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" required>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger btn-remove-obat">-</button>
                </div>
            `;
            
            container.appendChild(row);

            // Event listener untuk tombol hapus
            row.querySelector('.btn-remove-obat').addEventListener('click', function () {
                row.remove();
            });
        });
    });
</script>
@endsection
