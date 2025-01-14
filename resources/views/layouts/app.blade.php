<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? "SISTEK" }}</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <style>
    /* Pastikan wrapper utama mengambil seluruh tinggi layar */
    .wrapper {
      display: flex;
      height: 100vh;
      flex-direction: row;
      background-color: #f4f6f9;
    }

    /* Sidebar agar tetap fixed */
    .main-sidebar {
      width: 250px; /* Lebar sidebar */
      height: 100%;
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
    }

    /* Konten utama berada di sebelah kanan sidebar */
    .content-wrapper {
      margin-left: 250px; /* Menyesuaikan dengan lebar sidebar */
      padding: 20px;
      flex-grow: 1;
      background-color: #fff;
      height: 100%;
      overflow-y: auto; /* Menambahkan scroll jika konten terlalu panjang */
    }

    /* Navbar tetap di atas */
    .main-header {
      position: fixed;
      width: 100%;
      z-index: 1030;
      top: 0;
    }

    /* Menambah margin-top pada konten agar tidak tertutup navbar */
    .content-wrapper {
      margin-top: 60px;
    }

    /* Styling untuk tabel dan elemen lainnya agar responsif dan tetap teratur */
    table {
      width: 100%;
      margin-bottom: 1rem;
      color: #212529;
    }

    .nav-sidebar .nav-link.active {
      background-color: #4e73df;
      color: white;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('home') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">Logout</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ $title ?? "SIAKAD" }}</span>
      </a>

      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name }}</a>
          </div>
        </div>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pasien.index') }}" class="nav-link {{ Route::is('pasien.index') ? 'active' : '' }}">
                <i class="nav-icon far fa-address-card"></i>
                <p>Daftar Pasien</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('obat.index') }}" class="nav-link {{ Route::is('obat.index') ? 'active' : '' }}">
                <i class="nav-icon far fa-address-card"></i>
                <p>Daftar Obat</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('transaksi.index') }}" class="nav-link {{ Route::is('transaksi.index') ? 'active' : '' }}">
                <i class="nav-icon far fa-address-card"></i>
                <p>Transaksi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('suppliers.index') }}" class="nav-link {{ Route::is('suppliers.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-truck"></i>
                <p>Data Supplier</p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>

    <!-- Main Content Wrapper -->
    <div class="content-wrapper">
      @yield('content')  <!-- Konten berubah di sini -->
    </div>

  </div>

  <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
