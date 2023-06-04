@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <a href="{{ route('cetak-dashboard') }}" target="_blank" class="btn btn-primary mb-4"><i class="fas fa-plus"></i>
            Cetak Data
        </a>
        <div class="col-md-3 mb-3">
            <a href="{{ route('users.index') }}" class="text-decoration-none text-dark">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="display-3">{{ $count['user'] }}</div>
                            <div class="fs-6 mt-3">Jumlah Pengguna</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('siswa.index') }}" class="text-decoration-none text-dark">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="display-3">{{ $count['siswa'] }}</div>
                            <div class="fs-6 mt-3">Jumlah Siswa</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- <div class="col-md-3 mb-3">
            <a href="{{ route('siswa.index') }}" class="text-decoration-none text-dark">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="display-3">{{ $count['pangkep'] }}</div>
                            <div class="fs-6 mt-3">SMAN 13 PANGKEP</div>
                        </div>
                    </div>
                </div>
            </a>
        </div> -->
        <div class="col-md-3 mb-3">
            <a href="{{ route('pembayaran-siswa.index') }}" class="text-decoration-none text-dark">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="display-3">{{ $count['pembayaransiswa'] }}</div>
                            <div class="fs-6 mt-3">Jumlah Transaksi</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('metode-pembayaran.index') }}" class="text-decoration-none text-dark">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="display-3">{{ $count['metode'] }}</div>
                            <div class="fs-6 mt-3">Metode Pembayaran</div>
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
                            <div class="fs-6 mt-3">Jumlah Katalog Buku</div>
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
                            <div class="fs-6 mt-3">Informasi Ekstrakulikuler</div>
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
                            <div class="fs-6 mt-3">Informasi Aktivitas</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('peminjaman-buku.index') }}" class="text-decoration-none text-dark">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="display-3">{{ $count['peminjamanbuku'] }}</div>
                            <div class="fs-6 mt-3">Peminjaman Buku</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-header">Level Peminjaman Buku</div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Rendah</td>
                                <td>{{ $bookLevels['Low'] }}</td>
                            </tr>
                            <tr>
                                <td>Tinggi</td>
                                <td>{{ $bookLevels['Medium'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-header">Indikator Jumlah Pengguna</div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Rendah</td>
                                <td>{{ $penggunaLevels['Low'] }}</td>
                            </tr>
                            <tr>
                                <td>Tinggi</td>
                                <td>{{ $penggunaLevels['Medium'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-header">Indikator Jumlah Katalog Buku</div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Rendah</td>
                                <td>{{ $bukuLevels['Low'] }}</td>
                            </tr>
                            <tr>
                                <td>Tinggi</td>
                                <td>{{ $bukuLevels['Medium'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-header">Indikator Jumlah Pembayaran</div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Rendah</td>
                                <td>{{ $pembayaranLevels['Low'] }}</td>
                            </tr>
                            <tr>
                                <td>Tinggi</td>
                                <td>{{ $pembayaranLevels['Medium'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection
