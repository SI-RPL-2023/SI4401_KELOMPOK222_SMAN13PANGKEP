@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 mb-3">
            <a href="{{ route('siswa.index') }}" class="text-decoration-none text-dark">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="display-3">{{ $count['siswa'] }}</div>
                            <div class="fs-6 mt-3">Siswa</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('users.index') }}" class="text-decoration-none text-dark">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="display-3">{{ $count['guru'] }}</div>
                            <div class="fs-6 mt-3">Guru</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('buku.index') }}" class="text-decoration-none text-dark">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="display-3">{{ $count['buku'] }}</div>
                            <div class="fs-6 mt-3">Buku</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('ekstrakulikuler.index') }}" class="text-decoration-none text-dark">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="display-3">{{ $count['ekstrakulikuler'] }}</div>
                            <div class="fs-6 mt-3">Ekstrakulikuler</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('aktivitas.index') }}" class="text-decoration-none text-dark">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="display-3">{{ $count['aktivitas'] }}</div>
                            <div class="fs-6 mt-3">Kegiatan</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>
@endsection
