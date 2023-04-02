<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Aktivitas;
use App\Models\Buku;
use App\Models\Ekstrakulikuler;
use App\Models\MetodePembayaran;
use App\Models\Notifikasi;
use App\Models\PembayaranAsrama;
use App\Models\PembayaranSiswa;
use App\Models\PeminjamanBuku;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function list_aktivitas()
    {
        $items = Aktivitas::latest()->get();
        return view('pages.aktivitas.list', [
            'title' => 'Aktifitas',
            'items' => $items
        ]);
    }

    public function list_ekstrakulikuler()
    {
        if (request('q')) {
            $items = Ekstrakulikuler::where('nama', 'LIKE', '%' . request('q') . '%')->get();
        } else {
            $items = Ekstrakulikuler::latest()->get();
        }

        return view('pages.ekstrakulikuler.list', [
            'title' => 'Ekstrakulikuler',
            'items' => $items,
            'q' => request('q')
        ]);
    }


    public function list_buku()
    {
        if (request('q')) {
            $items = Buku::where('judul', 'LIKE', '%' . request('q') . '%')->get();
        } else {
            $items = Buku::latest()->get();
        }
        return view('pages.buku.list', [
            'title' => 'Buku',
            'items' => $items,
            'q' => request('q')
        ]);
    }


    public function list_peminjaman_buku()
    {
        $items = PeminjamanBuku::where('siswa_id', auth()->user()->siswa->id)->latest()->get();
        return view('pages.peminjaman-buku.list', [
            'title' => 'Peminjaman Buku',
            'items' => $items
        ]);
    }


    public function list_absensi()
    {
        $items = Absen::where('siswa_id', auth()->user()->siswa->id)->latest()->get();
        return view('pages.absen.list', [
            'title' => 'Absensi',
            'items' => $items
        ]);
    }

    public function list_absensi_create()
    {
        return view('pages.absen.list-absensi-create', [
            'title' => 'Form Absensi',
        ]);
    }


    public function list_pembayaran_asrama()
    {
        $items = PembayaranAsrama::orderBy('tahun_ajaran', 'DESC')->get();
        return view('pages.pembayaran-asrama.list', [
            'title' => 'List Pembayaran Asrama',
            'items' => $items,
            'metode_pembayaran' => MetodePembayaran::get()
        ]);
    }
}
