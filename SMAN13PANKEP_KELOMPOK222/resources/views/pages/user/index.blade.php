@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="text-center">Data User</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('users.create') }}" class="btn btn-primary mb-3"><i
                class="fas fa-plus"></i> Tambah Data</a>
        <table class="table table-striped table-hover" id="dTable">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Avatar</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor Hp</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ $item->avatar() }}" class="img-fluid rounded-circle"
                                style="max-height: 60px" alt="">
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->nomor_hp }}</td>
                        <td>{{ $item->role }}</td>
                        <td>
                            <a href="{{ route('users.edit', $item->id) }}"
                                class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                            <form action="{{ route('users.destroy',$item->id) }}" method="post"
                                class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btnDelete"><i
                                        class="fas fa-trash"></i> Hapus</button>
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
@section('content2')
    <section class="section">
        <div class="section-header">
            <h1>Data User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Data User</div>
            </div>
        </div>
        <div class="section-body">

        </div>
    </section>
@endsection
