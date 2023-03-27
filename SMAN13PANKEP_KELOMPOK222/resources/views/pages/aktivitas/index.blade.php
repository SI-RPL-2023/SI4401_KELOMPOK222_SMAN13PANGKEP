@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="text-center">Data Aktivitas</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('aktivitas.create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus"></i>
                    Tambah Data</a>
                <table class="table table-striped table-hover" id="dTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Gambar</th>
                            <th>Tanggal</th>
                            <th>Judul</th>
                            <th>Kontak Person</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ $item->gambar() }}" alt="" class="img-fluid" style="max-height: 80px">
                                </td>
                                <td>{{ $item->tanggal->translatedFormat('l, d F Y') }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->kontak_person }}</td>
                                <td>
                                    <a href="{{ route('aktivitas.edit', $item->id) }}" class="btn btn-info"><i
                                            class="fas fa-edit"></i> Edit</a>
                                    <form action="{{ route('aktivitas.destroy', $item->id) }}" method="post" class="d-inline">
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
