@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="text-center">Tambah Absen</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('absensi.store') }}" method="post" class="needs-validation" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-wrap">
                        <div class="mb-3">
                            <label for="siswa_id" class="form-label">Siswa</label>
                        <select name="siswa_id" id="siswa_id" class="form-control">
                            <option value="" selected disabled>Pilih NIS - Nama - Kelas</option>
                            @foreach ($siswas as $siswa)
                                <option value="{{ $siswa->id }}">{{ $siswa->nis . ' - ' . $siswa->nama . ' - ' . $siswa->kelas }}</option>
                            @endforeach
                        </select>
                            @error('siswa_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="datetime-local" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <div class="mb-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="deskripsi" id="attend" value="attend">
                                    <label class="form-check-label" for="attend">Attend</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="deskripsi" id="sick" value="sick">
                                    <label class="form-check-label" for="sick">Sick</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="deskripsi" id="license" value="license">
                                    <label class="form-check-label" for="license">License</label>
                                </div>
                            </div>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn float-right btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
