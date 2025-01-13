@extends('adminlte.layouts.auth')

@section('content')
<!-- <body class="hold-transition register-page" style="background-image: url('{{ asset('assets/dist/img/login_page.png')}}');"> -->
<body class="hold-transition register-page">
    <div class="register-box">
      <!-- <div class="register-logo">
        <a href="{{ route('home') }}"><b>{{ config('app.name', 'SISTEK') }}</b> 1.0</a>
        <h4>Sistem Informasi Akademik</h4>
      </div> -->

      <div class="card">
        <div class="card-body register-card-body">
          <div class="register-logo">
            <a href="{{ route('home') }}"><b style="font-weight: bold;">{{ config('app.name', 'SISTEK') }}</b> 1.0</a>
            <h4>Sistem Apotek</h4>
          </div>
          <!-- <p class="login-box-msg">Register a new membership</p> -->
          <p class="login-box-msg">Registrasi Member Baru</p>

          <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="input-group mb-3">
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama Lengkap" name="name" value="{{ old('name') }}">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
              @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="input-group mb-3">
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" name="email" value="{{ old('email') }}">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
              @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
              @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password_confirmation" placeholder="Ketik Ulang Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                  <label for="agreeTerms">
                   Menyetujui <a href="#">syarat dan ketentuan</a>
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <!-- <div class="social-auth-links text-center">
            <p>- ATAU -</p>
            <a href="#" class="btn btn-block btn-primary">
              <i class="fab fa-facebook mr-2"></i>
              Sign up dengan Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
              <i class="fab fa-google-plus mr-2"></i>
              Sign up dengan Google+
            </a>
          </div> -->
          @if (Route::has('login'))
          <a href="{{ route('login') }}" class="text-center">Sudah punya akun</a>
          @endif
        </div>
        <!-- /.form-box -->
      </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
@endsection
