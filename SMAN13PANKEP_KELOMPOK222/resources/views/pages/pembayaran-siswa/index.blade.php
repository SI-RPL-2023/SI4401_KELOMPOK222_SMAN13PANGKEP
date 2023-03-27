@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <h2 class="text-center">Data Pembayaran Siswa</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('pembayaran-siswa.create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus"></i>
                    Tambah Data</a>
             <div class="table-responsive">
                <table class="table table-striped table-hover" id="dTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Tahun Ajaran</th>
                            <th>Semester</th>
                            <th>Nominal</th>
                            <th>Metode Pembayaran</th>
                            <th>Status</th>
                            <th style="min-width: 380px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->siswa->nis }}</td>
                                <td>{{ $item->siswa->nama }}</td>
                                <td>{{ $item->siswa->kelas }}</td>
                                <td>{{ $item->asrama->tahun_ajaran }}</td>
                                <td>{{ $item->asrama->semester }}</td>
                                <td>Rp. {{ number_format($item->nominal) }}</td>
                                <td>{{ $item->metodepembayaran->nama  . ' - ' .  $item->metodepembayaran->nomor  }}</td>
                                <td>
                                    @if ($item->status === 'paid')
                                        <span class="badge bg-success">PAID</span>
                                    @elseif($item->status === 'process')
                                    <span class="badge bg-warning">PROCESS</span>
                                    @else
                                    <span class="badge bg-danger">UNPAID</span>
                                    @endif
                                </td>
                                <td>
                                   @if ($item->bukti)
                                   <a href="{{ route('pembayaran-siswa.download', $item->id) }}" class="btn btn-secondary"><i
                                    class="fas fa-download"></i> Download Bukti</a>
                                    @else
                                    <a href="#" class="btn btn-secondary"><i
                                        class="fas fa-download"></i>Tidak Ada Bukti</a>
                                   @endif
                                            <a href="{{ route('pembayaran-siswa.edit', $item->id) }}" class="btn btn-info"><i
                                                class="fas fa-edit"></i> Edit</a>
                                    <form action="{{ route('pembayaran-siswa.destroy', $item->id) }}" method="post" class="d-inline">
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
    </div>
@endsection
