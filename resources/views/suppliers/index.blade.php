@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Supplier</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('suppliers.create') }}" class="btn btn-primary">Tambah Supplier</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kontak</th>
                    <th>Email</th>
                    <th>Data Obat Supplier</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->nama }}</td>
                        <td>{{ $supplier->alamat }}</td>
                        <td>{{ $supplier->kontak }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>{{ $supplier->data_obat_supplier }}</td>
                        <td>
                            <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
