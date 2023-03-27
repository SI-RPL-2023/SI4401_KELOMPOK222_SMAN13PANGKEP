@extends('auth.app')
@section('judul','Login')
@section('content')
<section class="section">
    <div class="container mt-5">
       <div class="row">
        <div class="col-md-5">
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="col-md-5">
            @if (session('success'))
            <div class="alert alert-danger">
                {{ session('success') }}
            </div>
        @endif
        </div>
       </div>
      <div class="row">
        <div class="col-md-5 align-self-center">
          <div class="login-brand">
           <h2>Login</h2>
          </div>

          <form method="POST" action="{{ route('login-proses') }}" class="needs-validation" novalidate="">
            @csrf
            <div class="form-group">
                <label for="role">Login Sebagai</label>
                <select name="role" id="role" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="siswa" selected>Siswa</option>
                    <option value="bendaharawan">Bendaharawan</option>
                    <option value="pustakawan">Pustakawan</option>
                    <option value="guru">Guru</option>
                </select>
                @error('role')
                <div class="invalid-feedback">
                 {{ $message }}
                </div>
                @enderror
              </div>
            <div class="form-group">
              <label for="email">Email atau Nomor Hp</label>
              <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" tabindex="1" required autofocus>
              @error('email')
              <div class="invalid-feedback">
               {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group">
              <div class="d-block">
                  <label for="password" class="control-label">Password</label>
              </div>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required>
              @error('password')
              <div class="invalid-feedback">
               {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                <label class="custom-control-label" for="remember-me">Remember Me</label>
              </div>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                Login
              </button>
            </div>
          </form>
          <p>Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
        </div>
        <div class="col-md-7 mt-5">
            <p style="font-family:San-serif;font-size:50px;margin-top:80px;margin-left:130px"><b>Welcome, Pengguna.</b></p>
            <img src="{{ asset('assets/backend/vector/bendaharawan.jpg') }}" style="width:55%;margin-top:30px;margin-left:160px">
        </div>
      </div>
    </div>
</section>
@endsection
