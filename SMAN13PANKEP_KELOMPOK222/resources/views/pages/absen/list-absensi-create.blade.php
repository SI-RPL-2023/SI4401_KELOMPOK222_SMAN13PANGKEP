@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <nav>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('list-absensi.index') }}">Absensi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('list-absensi.create') }}">Form Absen</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="text-center">Form Absen</h2>
            </div>
        </div>
        <div class="row">
            <form action="{{ route('list-absensi.store') }}" method="post" class="needs-validation" novalidate=""
                enctype="multipart/form-data">
                @csrf
                <div class="form-wrap">
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="text" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                            name="tanggal" value="{{ Carbon\Carbon::now()->translatedFormat('d-m-Y H:i:s') }}" disabled>
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
                                <input class="form-check-input" type="radio" name="deskripsi" id="attend"
                                    value="attend">
                                <label class="form-check-label" for="attend">Attend</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="deskripsi" id="sick"
                                    value="sick">
                                <label class="form-check-label" for="sick">Sick</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="deskripsi" id="license"
                                    value="license">
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
                    <button class="btn float-right btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
