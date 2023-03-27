@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="text-center">Data Buku</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('buku.create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus"></i>
                    Tambah Data</a>
                <table class="table table-striped table-hover" id="dTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Gambar</th>
                            <th>Kode</th>
                            <th>Judul</th>
                            <th>Jenis</th>
                            <th>Subjek</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ $item->gambar() }}" class="img-fluid"
                                        style="max-height: 60px" alt="">
                                </td>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->jenis }}</td>
                                <td>{{ $item->subjek }}</td>
                                <td>
                                    <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-info"><i
                                            class="fas fa-edit"></i> Edit</a>
                                    <form action="{{ route('buku.destroy', $item->id) }}" method="post" class="d-inline">
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
