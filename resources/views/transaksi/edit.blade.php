@extends('adminlte.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Edit Transaksi</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <!-- Dropdown Pasien -->
                    <div class="form-group">
                        <label for="pasien_id">Nama Pasien</label>
                        <select name="pasien_id" id="pasien_id" class="form-control" required>
                            @foreach($pasiens as $pasien)
                                <option value="{{ $pasien->id }}" {{ $transaksi->pasien_id == $pasien->id ? 'selected' : '' }}>{{ $pasien->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Input Obat, Jumlah, dan Harga -->
                    <div class="form-group">
                        <label>Obat</label>
                        <div id="obat-container">
                            @foreach($transaksi->obats as $obat)
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <select name="obat_id[]" class="form-control" required>
                                            @foreach($obats as $obatOption)
                                                <option value="{{ $obatOption->id }}" 
                                                    {{ $obatOption->id == $obat->id ? 'selected' : '' }} data-harga="{{ $obatOption->harga }}">
                                                    {{ $obatOption->nama_obat }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" name="jumlah[]" class="form-control" value="{{ $obat->pivot->jumlah }}" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="harga[]" class="form-control" value="{{ $obat->pivot->harga }}" required readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger btn-remove-obat">-</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-success btn-add-obat">Tambah Obat</button>
                    </div>

                    <!-- Input Tanggal -->
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $transaksi->tanggal }}" required>
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
        // Function to update harga based on selected obat
        function updateHarga() {
            const selectedObats = document.querySelectorAll('select[name="obat_id[]"]');
            selectedObats.forEach(function(select) {
                const hargaField = select.closest('.row').querySelector('input[name="harga[]"]');
                const selectedOption = select.options[select.selectedIndex];
                const harga = selectedOption.getAttribute('data-harga');
                hargaField.value = harga;  // Update harga field
            });
        }

        // Initial call to update harga for existing rows
        updateHarga();

        // Event listener untuk tombol tambah obat
        document.querySelector('.btn-add-obat').addEventListener('click', function () {
            const container = document.querySelector('#obat-container');
            const row = document.createElement('div');
            row.classList.add('row', 'mb-2');

            row.innerHTML = `
                <div class="col-md-4">
                    <select name="obat_id[]" class="form-control" required>
                        @foreach($obats as $obat)
                            <option value="{{ $obat->id }}" data-harga="{{ $obat->harga }}">{{ $obat->nama_obat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" required>
                </div>
                <div class="col-md-3">
                    <input type="number" name="harga[]" class="form-control" placeholder="Harga" required readonly>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger btn-remove-obat">-</button>
                </div>
            `;

            container.appendChild(row);

            // Update harga when a new obat is selected
            row.querySelector('select[name="obat_id[]"]').addEventListener('change', function () {
                updateHarga();
            });

            // Event listener untuk tombol hapus
            row.querySelector('.btn-remove-obat').addEventListener('click', function () {
                row.remove();
                updateHarga();  // Recalculate harga after removal
            });

            // Update harga after adding new row
            updateHarga();
        });

        // Handle removal of existing obat rows
        document.querySelectorAll('.btn-remove-obat').forEach(button => {
            button.addEventListener('click', function () {
                this.closest('.row').remove();
                updateHarga();  // Recalculate harga after removal
            });
        });

        // Update harga when obat is selected
        document.querySelectorAll('select[name="obat_id[]"]').forEach(select => {
            select.addEventListener('change', function () {
                updateHarga();
            });
        });
    });
</script>
@endsection
