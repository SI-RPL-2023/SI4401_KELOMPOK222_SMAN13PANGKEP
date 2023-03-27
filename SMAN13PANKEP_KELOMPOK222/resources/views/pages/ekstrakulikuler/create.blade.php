@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="text-center">Tambah Ekstrakulikuler</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('ekstrakulikuler.store') }}" method="post" class="needs-validation" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-wrap">
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                            @error('gambar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis</label>
                            <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis">
                            @error('jenis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pelatih" class="form-label">Pelatih</label>
                            <input type="text" class="form-control @error('pelatih') is-invalid @enderror" id="pelatih" name="pelatih">
                            @error('pelatih')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pencapaian" class="form-label">Pencapaian</label>
                          <textarea name="pencapaian" id="pencapaian" class="form-control @error('pencapaian') is-invalid @enderror" cols="30" rows="10">{{ old('pencapaian') }}</textarea>
                            @error('pencapaian')
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
