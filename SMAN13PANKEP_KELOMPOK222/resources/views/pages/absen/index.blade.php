@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="text-center">Data Absen</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('absensi.create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus"></i>
                    Tambah Data</a>
                <table class="table table-striped table-hover" id="dTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Nama Siswa</th>
                            <th>NIS</th>
                            <th>Kelas</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
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
                                <td>
                                    <a href="{{ route('absensi.edit', $item->id) }}" class="btn btn-info"><i
                                            class="fas fa-edit"></i> Edit</a>
                                    <form action="{{ route('absensi.destroy', $item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button
                                            class="btn btn-danger"><i class="fas fa-trash"></i>
                                            Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
