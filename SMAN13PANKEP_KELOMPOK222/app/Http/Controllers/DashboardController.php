<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aktivitas;
use App\Models\Buku;
use App\Models\Ekstrakulikuler;
use App\Models\Siswa;
use App\Models\User;
use App\Models\PeminjamanBuku;
use App\Models\PembayaranSiswa;
use App\Models\MetodePembayaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'guru') {
            return redirect()->route('absensi.index');
        }
        if (auth()->user()->role === 'siswa') {
            return redirect()->route('list-pembayaran-asrama.index');
        }
        if (auth()->user()->role === 'pustakawan') {
            return redirect()->route('peminjaman-buku.index');
        }
        if (auth()->user()->role === 'bendaharawan') {
            return redirect()->route('pembayaran-siswa.index');
        }
        if (auth()->user()->role === 'admin') {

            $count = [
                'siswa' => Siswa::count(),
                'pangkep' => Siswa::where('SMA', 'SMAN 13 PANGKEP')->count(),
                'user' => User::count(),
                'buku' => Buku::count(),
                'ekstrakulikuler' => Ekstrakulikuler::count(),
                'aktivitas' => Aktivitas::count(),
                'peminjamanbuku' => PeminjamanBuku::count(),
                'pembayaransiswa' => PembayaranSiswa::count(),
                'metode' => MetodePembayaran::count(),
            ];

            // Indikator Jumlah Peminjaman Buku

            $bookLoanCounts = PeminjamanBuku::selectRaw('COUNT(*) as total')
                ->get();

            $bookLevels = [
                'Low' => 0,
                'Medium' => 0,
            ];

            foreach ($bookLoanCounts as $bookLoanCount) {
                if ($bookLoanCount->total < 5) {
                    $bookLevels['Low']++;
                } else  {
                    $bookLevels['Medium']++;
                }
            }

            //Indikator Jumlah Pengguna

            $PenggunaCounts = User::selectRaw('COUNT(*) as total')
                ->get();

            $penggunaLevels = [
                'Low' => 0,
                'Medium' => 0,
            ];

            foreach ($PenggunaCounts as $penggunaCount) {
                if ($penggunaCount->total < 5) {
                    $penggunaLevels['Low']++;
                } else  {
                    $penggunaLevels['Medium']++;
                }
            }

            //Indikator Katalog Buku

            $bukuCounts = Buku::selectRaw('COUNT(*) as total')
            ->get();

            $bukuLevels = [
                'Low' => 0,
                'Medium' => 0,
            ];

            foreach ($bukuCounts as $bukuCount) {
                if ($bukuCount->total < 5) {
                    $bukuLevels['Low']++;
                } else  {
                    $bukuLevels['Medium']++;
                }
            }

            // Indikator Transaksi

            $pembayaranCounts = PembayaranSiswa::selectRaw('COUNT(*) as total')
            ->get();

            $pembayaranLevels = [
                'Low' => 0,
                'Medium' => 0,
            ];

            foreach ($pembayaranCounts as $pembayaranCount) {
                if ($pembayaranCount->total < 5) {
                    $pembayaranLevels['Low']++;
                } else  {
                    $pembayaranLevels['Medium']++;
                }
            }
            
            return view('pages.dashboard', [
                'title' => 'Dashboard',
                'count' => $count,
                'bookLevels' => $bookLevels,
                'penggunaLevels' => $penggunaLevels,
                'bukuLevels' => $bukuLevels,
                'pembayaranLevels' => $pembayaranLevels,
            ]);
        }
    }

    public function cetakdashboard()
    {
        if (auth()->user()->role === 'guru') {
            return redirect()->route('absensi.index');
        }
        if (auth()->user()->role === 'siswa') {
            return redirect()->route('list-pembayaran-asrama.index');
        }
        if (auth()->user()->role === 'pustakawan') {
            return redirect()->route('peminjaman-buku.index');
        }
        if (auth()->user()->role === 'bendaharawan') {
            return redirect()->route('pembayaran-siswa.index');
        }
        if (auth()->user()->role === 'admin') {


            $siswa = Siswa::orderBy('nama','asc')->get();
            $user = User::orderBy('name','ASC')->get();
            $buku = Buku::orderBy('SMA', 'ASC')->get();
            $peminjaman = PeminjamanBuku::latest()->get();
            $pembayaran = PembayaranSiswa::latest()->get();

            $count = [
                'siswa' => Siswa::count(),
                'pangkep' => Siswa::where('SMA', 'SMAN 13 PANGKEP')->count(),
                'user' => User::count(),
                'buku' => Buku::count(),
                'ekstrakulikuler' => Ekstrakulikuler::count(),
                'aktivitas' => Aktivitas::count(),
                'peminjamanbuku' => PeminjamanBuku::count(),
                'pembayaransiswa' => PembayaranSiswa::count(),
                'metode' => MetodePembayaran::count(),
            ];

            // Indikator Jumlah Peminjaman Buku

            $bookLoanCounts = PeminjamanBuku::selectRaw('COUNT(*) as total')
                ->get();

            $bookLevels = [
                'Low' => 0,
                'Medium' => 0,
            ];

            foreach ($bookLoanCounts as $bookLoanCount) {
                if ($bookLoanCount->total < 5) {
                    $bookLevels['Low']++;
                } else  {
                    $bookLevels['Medium']++;
                }
            }

            //Indikator Jumlah Pengguna

            $PenggunaCounts = User::selectRaw('COUNT(*) as total')
                ->get();

            $penggunaLevels = [
                'Low' => 0,
                'Medium' => 0,
            ];

            foreach ($PenggunaCounts as $penggunaCount) {
                if ($penggunaCount->total < 5) {
                    $penggunaLevels['Low']++;
                } else  {
                    $penggunaLevels['Medium']++;
                }
            }

            //Indikator Katalog Buku

            $bukuCounts = Buku::selectRaw('COUNT(*) as total')
            ->get();

            $bukuLevels = [
                'Low' => 0,
                'Medium' => 0,
            ];

            foreach ($bukuCounts as $bukuCount) {
                if ($bukuCount->total < 5) {
                    $bukuLevels['Low']++;
                } else  {
                    $bukuLevels['Medium']++;
                }
            }

            // Indikator Transaksi

            $pembayaranCounts = PembayaranSiswa::selectRaw('COUNT(*) as total')
            ->get();

            $pembayaranLevels = [
                'Low' => 0,
                'Medium' => 0,
            ];

            foreach ($pembayaranCounts as $pembayaranCount) {
                if ($pembayaranCount->total < 5) {
                    $pembayaranLevels['Low']++;
                } else  {
                    $pembayaranLevels['Medium']++;
                }
            }


            $siswaCounts = Siswa::selectRaw('COUNT(*) as total')
            ->get();

            $siswaLevels = [
                'Low' => 0,
                'Medium' => 0,
            ];

            foreach ($siswaCounts as $siswaCount) {
                if ($siswaCount->total < 5) {
                    $siswaLevels['Low']++;
                } else  {
                    $siswaLevels['Medium']++;
                }
            }

            
            return view('pages.cetak-dashboard', [
                'title' => 'Dashboard',
                'siswa' => $siswa,
                'user' => $user,
                'buku' => $buku,
                'peminjaman' => $peminjaman,
                'pembayaran' => $pembayaran,
                'count' => $count,
                'siswaLevels' => $siswaLevels,
                'bookLevels' => $bookLevels,
                'penggunaLevels' => $penggunaLevels,
                'bukuLevels' => $bukuLevels,
                'pembayaranLevels' => $pembayaranLevels,
            ]);
        }
    }
}
