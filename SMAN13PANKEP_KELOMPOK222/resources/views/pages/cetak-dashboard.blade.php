<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.static{
            position: relative;
            border : 1px solid #543535;
        }
    </style>
    <title>Reporting</title>
</head>
    <body>
        <div class="form-group">
            <p align="center"><b>Data Siswa</b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>SMA</th>
                    <th>NIS</th>
                </tr>
                @foreach ($siswa as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->kelas }}</td>
                    <td>{{ $item->SMA }}</td>
                    <td>{{ $item->nis }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="form-group">
            <p align="center"><b></b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                    <th>Jumlah Siswa</th>
                </tr>
                <tr>
                    <td align="center">{{ $count['siswa'] }}</td>
                </tr>
            </table>
        </div>
        <div class="form-group">
            <p align="center"><b></b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                    <th>Indikator Jumlah Siswa</th>
                </tr>
                <tr>
                    <td align="center">Rendah</td>
                    <td align="center">{{ $siswaLevels['Low'] }}</td>
                </tr>
                <tr>
                    <td align="center">Sedang</td>
                    <td align="center">{{ $siswaLevels['Medium'] }}</td>
                </tr>
            </table>
        </div>
        <div class="form-group">
            <p align="center"><b>Data Pengguna</b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor HP</th>
                    <th>role</th>
                </tr>
                @foreach ($user as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->nomor_hp }}</td>
                    <td>{{ $item->role }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="form-group">
            <p align="center"><b></b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                    <th>Jumlah Pengguna</th>
                </tr>
                <tr>
                    <td align="center">{{ $count['user'] }}</td>
                </tr>
            </table>
        </div>
        <div class="form-group">
            <p align="center"><b></b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                    <th>Indikator Jumlah Pengguna</th>
                </tr>
                <tr>
                    <td align="center">Rendah</td>
                    <td align="center">{{ $penggunaLevels['Low'] }}</td>
                </tr>
                <tr>
                    <td align="center">Sedang</td>
                    <td align="center">{{ $penggunaLevels['Medium'] }}</td>
                </tr>
            </table>
        </div>
        <div class="form-group">
            <p align="center"><b>Data Katalog Buku</b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                    <th>No.</th>
                    <th>SMA</th>
                    <th>Judul</th>
                    <th>Kode Buku</th>
                    <th>Jenis Buku</th>
                    <th>Subjek Buku</th>
                </tr>
                @foreach ($buku as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->SMA }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->jenis }}</td>
                    <td>{{ $item->subjek }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="form-group">
            <p align="center"><b></b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                    <th>Jumlah Katalog Buku</th>
                </tr>
                <tr>
                    <td align="center">{{ $count['buku'] }}</td>
                </tr>
            </table>
        </div>
        <div class="form-group">
            <p align="center"><b></b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                    <th>Indikator Jumlah Katalog Buku</th>
                </tr>
                <tr>
                    <td align="center">Rendah</td>
                    <td align="center">{{ $bukuLevels['Low'] }}</td>
                </tr>
                <tr>
                    <td align="center">Sedang</td>
                    <td align="center">{{ $bukuLevels['Medium'] }}</td>
                </tr>
            </table>
        </div>
        <div class="form-group">
            <p align="center"><b>Data Peminjaman Buku</b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>Kelas</th>
                    <th>SMA</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status Peminjaman</th>
                </tr>
                @foreach ($peminjaman as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->siswa->nama }}</td>
                    <td>{{ $item->siswa->nis }}</td>
                    <td>{{ $item->siswa->kelas }}</td>
                    <td>{{ $item->buku->SMA }}</td>
                    <td>{{ $item->buku->kode }}</td>
                    <td>{{ $item->buku->judul }}</td>
                    <td>{{ $item->start_date }}</td>
                    <td>
                        @if ($item->return_date)
                        {{ $item->return_date }}
                        @else
                        Belum Dikembalikan
                        @endif
                    </td>
                    <td style="color:#104DAA">{{ $item->status }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="form-group">
            <p align="center"><b></b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                    <th>Jumlah Peminjaman Buku</th>
                </tr>
                <tr>
                    <td align="center">{{ $count['peminjamanbuku'] }}</td>
                </tr>
            </table>
        </div>
        <div class="form-group">
            <p align="center"><b></b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                    <th>Indikator Jumlah Peminjaman Buku</th>
                </tr>
                <tr>
                    <td align="center">Rendah</td>
                    <td align="center">{{ $bookLevels['Low'] }}</td>
                </tr>
                <tr>
                    <td align="center">Sedang</td>
                    <td align="center">{{ $bookLevels['Medium'] }}</td>
                </tr>
            </table>
        </div>
        <div class="form-group">
            <p align="center"><b>Data Katalog Buku</b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                    <th>No.</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Tahun Ajaran</th>
                    <th>Semester</th>
                    <th>Nominal</th>
                    <th>Metode Pembayaran</th>
                    <th>Status</th>
                </tr>
                @foreach ($pembayaran as $item)
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
                </tr>
                @endforeach
            </table>
        </div>
        <div class="form-group">
            <p align="center"><b></b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                    <th>Jumlah Pembayaran Siswa</th>
                </tr>
                <tr>
                    <td align="center">{{ $count['pembayaransiswa'] }}</td>
                </tr>
            </table>
        </div>
        <div class="form-group">
            <p align="center"><b></b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                    <th>Indikator Jumlah Pembayaran Siswa</th>
                </tr>
                <tr>
                    <td align="center">Rendah</td>
                    <td align="center">{{ $pembayaranLevels['Low'] }}</td>
                </tr>
                <tr>
                    <td align="center">Sedang</td>
                    <td align="center">{{ $pembayaranLevels['Medium'] }}</td>
                </tr>
            </table>
        </div>
        <script type="text/javascript">
            window.print();
        </script>
    </body>
</html>
