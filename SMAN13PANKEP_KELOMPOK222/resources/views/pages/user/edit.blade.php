@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="text-center">Edit User</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('users.update',$item->id) }}" method="post" class="needs-validation" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-wrap">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $item->name }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $item->email }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nomor_hp" class="form-label">Nomor Hp</label>
                            <input type="text" class="form-control @error('nomor_hp') is-invalid @enderror" id="nomor_hp" name="nomor_hp" value="{{ $item->nomor_hp ?? '' }}">
                            @error('nomor_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                           <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                            <option @selected($item->role === 'admin') value="admin">Admin</option>
                            <option @selected($item->role === 'siswa') value="siswa">Siswa</option>
                            <option @selected($item->role === 'bendaharawan') value="bendaharawan">Bendaharawan</option>
                            <option @selected($item->role === 'pustakawan') value="pustakawan">Pustakawan</option>
                            <option @selected($item->role === 'guru') value="guru">Guru</option>
                        </select>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn float-right btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
