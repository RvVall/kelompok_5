@extends('adminlte.layouts.auth')

@section('content')
<!-- <body class="hold-transition login-page" style="background-image: url('{{ asset('assets/dist/img/login_page.png')}}');"> -->
<body class="hold-transition login-page"  >
    <!-- <div class="login-box"> -->
    <div class="login-box">
      <!-- <div class="login-logo">
        <a href="{{ route('home') }}"><b>{{ config('app.name', 'SIAKAD') }}</b> 1.0</a>
        <h4>Sistem Informasi Akademik</h4>
      </div> -->
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <div class="login-logo">
            <a href="{{ route('home') }}"><b style="font-weight: bold;">{{ config('app.name', 'SIAKAD') }}</b> 1.0</a>
            <h4>Sistem Informasi Akademik</h4>
          </div>
          <!-- <p class="login-box-msg">Sign in to start your session</p> -->
          <p class="login-box-msg">Login</p>

          <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="input-group mb-3">
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
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
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label for="remember">
                    {{ __('Ingat Saya') }}
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <!-- <div class="social-auth-links text-center mb-3">
            <p>- ATAU -</p>
            <a href="#" class="btn btn-block btn-primary">
              <i class="fab fa-facebook mr-2"></i> Sign in dengan Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
              <i class="fab fa-google-plus mr-2"></i> Sign in dengan Google+
            </a>
          </div> -->
          <!-- /.social-auth-links -->
          @if (Route::has('password.request'))
          <p class="mb-1">
            <a href="{{ route('password.request') }}">{{ __('Lupa Password?') }}</a>
          </p>
          @endif
          @if (Route::has('register'))
          <p class="mb-0">
            <a href="{{ route('register') }}" class="text-center">{{ __('Registrasi') }}</a>
          </p>
          @endif
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
@endsection
