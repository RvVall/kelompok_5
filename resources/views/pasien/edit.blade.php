@extends('adminlte.layouts.app')

@section('content')
\
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Edit Data Pasien</h1>
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

        
        <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nomor_rekam_medis">Nomor Rekam Medis</label>
                <input type="text" name="nomor_rekam_medis" id="nomor_rekam_medis" class="form-control" value="{{ old('nomor_rekam_medis', $pasien->nomor_rekam_medis) }}" required>
            </div>
            
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $pasien->nama) }}" required>
            </div>
            
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat', $pasien->alamat) }}" required>
            </div>
            
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}" required>
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                <option value="Laki-laki" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-success mt-3">Update Pasien</button>
    </form>
    </div>
</div>
@endsection
