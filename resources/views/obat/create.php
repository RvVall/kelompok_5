@extends('adminlte.layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Tambah Data Obat</h1>
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

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header p-0 pt-1 border-bottom-0">
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="{{ route('obat.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Obat <span style="color: red">*)</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" placeholder="Kode Obat" name="kode_obat" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Obat <span style="color: red">*)</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" placeholder="Nama Obat" name="nama_obat" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Obat <span style="color: red">*)</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" placeholder="Jenis Obat" name="jenis_obat" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Harga <span style="color: red">*)</span></label>
                                    <div class="col-sm-5">
                                        <input type="number" class="form-control" placeholder="Harga" name="harga" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Stok <span style="color: red">*)</span></label>
                                    <div class="col-sm-5">
                                        <input type="number" class="form-control" placeholder="Stok" name="stok" required>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan</button>
                                    <a href="{{ route('obat.index') }}" class="btn btn-default"><i class="fa fa-share-square-o" aria-hidden="true"></i> Kembali</a>
                                </div>
                            </div>
                            <!-- /.card-footer -->
                        </form>
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
