@extends('auth.app')
@section('judul','Register')
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
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 align-self-center">
                    <div class="login-brand">
                        <h2>Daftar</h2>
                    </div>

                    <form method="POST" action="{{ route('register-proses') }}" class="needs-validation" novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="role">Register Sebagai</label>
                            <select name="role" id="role" class="form-control">
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
                            <label for="name">Nama</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" tabindex="1" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" tabindex="1" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nomor_hp">Nomor Hp</label>
                            <input id="nomor_hp" type="text"
                                class="form-control @error('nomor_hp') is-invalid @enderror" name="nomor_hp"
                                value="{{ old('nomor_hp') }}" tabindex="1" required autofocus>
                            @error('nomor_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">Password</label>
                            </div>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2"
                                required>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password_confirmation" class="control-label">Konfirmasi Password</label>
                            </div>
                            <input id="password_confirmation" type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" tabindex="2"
                                required>
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                Daftar
                            </button>
                        </div>
                    </form>
                    <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
                </div>
                <div class="col-md-7 mt-5">
                    <p style="font-family:San-serif;font-size:50px;margin-top:80px;margin-left:130px"><b>Welcome,
                            Pengguna.</b></p>
                    <img src="{{ asset('assets/backend/vector/bendaharawan.jpg') }}"
                        style="width:55%;margin-top:30px;margin-left:160px">
                </div>
            </div>
        </div>
    </section>
@endsection
