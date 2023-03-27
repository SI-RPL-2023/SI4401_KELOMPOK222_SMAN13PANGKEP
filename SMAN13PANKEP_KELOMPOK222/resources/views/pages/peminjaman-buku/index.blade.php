@extends('layouts.app')
@section('content')
    <div class="container">
        <center>
            <font face="San-serif" size="6"><b>Peminjaman Buku</b></font>
        </center>
        <br><br>
       <div class="row">
        <div class="col-md-12">
            <table class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Class</th>
                        <th scope="col">Code Book</th>
                        <th scope="col">Book Title</th>
                        <th scope="col">Start</th>
                        <th scope="col">End</th>
                        <th scope="col">Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->siswa->nama }}</td>
                        <td>{{ $item->siswa->nis }}</td>
                        <td>{{ $item->siswa->kelas }}</td>
                        <td>{{ $item->buku->kode }}</td>
                        <td>{{ $item->buku->judul }}</td>
                        <td>{{ $item->start_date->translatedFormat('d-m-Y') }}</td>
                        <td>
                            @if ($item->return_date)
                            {{ $item->return_date->translatedFormat('d-m-Y') }}
                            @else
                            Belum Dikembalikan
                            @endif
                        </td>
                        <td style="color:#104DAA">{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('peminjaman-buku.edit',$item->id) }}" class="btn btn-info">Edit</a>
                            <form action="{{ route('peminjaman-buku.destroy', $item->id) }}" method="post" class="d-inline">
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
            <br>
        </div>
       </div>
    </div>
@endsection
