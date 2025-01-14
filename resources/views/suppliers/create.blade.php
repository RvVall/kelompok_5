@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Supplier</h2>
        <form action="{{ route('suppliers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Supplier</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat') }}" required>
            </div>
            <div class="form-group">
                <label for="kontak">Kontak</label>
                <input type="text" name="kontak" id="kontak" class="form-control" value="{{ old('kontak') }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="data_obat_supplier">Data Obat Supplier</label>
                <textarea name="data_obat_supplier" id="data_obat_supplier" class="form-control">{{ old('data_obat_supplier') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
