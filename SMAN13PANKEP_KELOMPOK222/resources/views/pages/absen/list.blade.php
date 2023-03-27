@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <nav>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('list-absensi.index') }}">Absensi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('list-absensi.create') }}">Form Absen</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="text-center">Absen</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover" id="dTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Nama Siswa</th>
                            <th>NIS</th>
                            <th>Kelas</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->tanggal->translatedFormat('d-m-Y H:i:s') }}</td>
                                <td>{{ $item->siswa->nama }}</td>
                                <td>{{ $item->siswa->nis }}</td>
                                <td>{{ $item->siswa->kelas }}</td>
                                <td>{{ $item->deskripsi }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
