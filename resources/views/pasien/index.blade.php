@extends('adminlte.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Daftar Data Pasien</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li> -->
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="container"> 

    <!-- Tombol Tambah Pasien -->
    <a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">Tambah Pasien</a>
    
    <!-- Tabel Data Pasien -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Rekam Medis</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pasiens as $pasien)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pasien->nomor_rekam_medis }}</td>
                <td>{{ $pasien->nama }}</td>
                <td>{{ $pasien->alamat }}</td>
                <td>{{ $pasien->tanggal_lahir }}</td>
                <td>{{ $pasien->jenis_kelamin }}</td>
                <td>
                    <!-- Tombol Aksi -->
                    <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pasien ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada data pasien.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>
@endsection
