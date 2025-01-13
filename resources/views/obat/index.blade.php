@extends('adminlte.layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Daftar Obat</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- Breadcrumb if needed -->
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header p-0 pt-1 border-bottom-0">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="card-title pt-2 pl-3">Data Obat</h3>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <a href="{{ route('obat.create') }}" class="btn btn-primary mr-3 mt-2">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Tambah Obat
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <!-- Card Body -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Obat</th>
                                        <th>Nama Obat</th>
                                        <th>Jenis Obat</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($obat as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->kode_obat }}</td>
                                            <td>{{ $item->nama_obat }}</td>
                                            <td>{{ $item->jenis_obat }}</td>
                                            <td>Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                                            <td>{{ $item->stok }}</td>
                                            <td>
                                                <a href="{{ route('obat.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-edit" aria-hidden="true"></i> Edit
                                                </a>
                                                <form action="{{ route('obat.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus obat ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash" aria-hidden="true"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
