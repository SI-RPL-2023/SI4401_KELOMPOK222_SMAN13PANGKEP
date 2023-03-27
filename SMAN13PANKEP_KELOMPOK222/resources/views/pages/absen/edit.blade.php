@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="text-center">Edit Absensi</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('absensi.update',$item->id) }}" method="post" class="needs-validation" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-wrap">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Siswa</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $item->siswa->nis . ' - ' . $item->siswa->nama . ' - ' . $item->siswa->kelas }}" readonly>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="text" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ $item->tanggal->translatedFormat('d-m-Y H:i:s') }}" readonly>
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
                                    <input class="form-check-input" type="radio" name="deskripsi" id="attend" value="attend" @checked($item->deskripsi === 'attend')>
                                    <label class="form-check-label" for="attend">Attend</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="deskripsi" id="sick" value="sick" @checked($item->deskripsi === 'sick')>
                                    <label class="form-check-label" for="sick">Sick</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="deskripsi" id="license" value="license" @checked($item->deskripsi === 'license')>
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
                        <button class="btn float-right btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
