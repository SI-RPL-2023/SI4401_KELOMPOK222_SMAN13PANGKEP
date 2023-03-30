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
    public function list_aktivitas_detail($id)
    {
        $item = Aktivitas::findOrFail($id);
        return view('pages.aktivitas.list-show', [
            'title' => 'Aktifitas Detail',
            'item' => $item
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
    public function list_ekstrakulikuler_detail($id)
    {
        $item = Ekstrakulikuler::findOrFail($id);
        return view('pages.ekstrakulikuler.list-show', [
            'title' => 'Ekstrakulikuler',
            'item' => $item
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
    public function list_buku_detail($id)
    {
        $item = Buku::findOrFail($id);
        return view('pages.buku.list-show', [
            'title' => 'Buku',
            'item' => $item
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

    public function peminjaman_buku_create($id)
    {
        $item = Buku::findOrFail($id);
        return view('pages.peminjaman-buku.create', [
            'title' => 'Peminjaman Buku',
            'item' => $item
        ]);
    }
    public function peminjaman_buku_store($buku_id)
    {
        request()->validate([
            'start_date' => ['required'],
            'return_date' => ['required']
        ]);

        $pem = PeminjamanBuku::create([
            'siswa_id' => auth()->user()->siswa->id,
            'buku_id' => $buku_id,
            'start_date' => request('start_date'),
            'return_date' => request('return_date')
        ]);

        // send notif
        $pustakawan = User::where('role', 'pustakawan')->get();
        if ($pustakawan->count() > 0) {
            foreach ($pustakawan as $pus) {
                Notifikasi::create([
                    'pengirim_id' => auth()->id(),
                    'judul' => auth()->user()->name . ' telah membuat permintaan meminjam buku dengan judul ' . '"' . $pem->buku->judul . '"' . ' Silahkan cek dan segeralah approve',
                    'penerima_id' => $pus->id,
                    'status' => 0
                ]);
            }
        }

        return redirect()->route('list-peminjaman-buku.index')->with('success', 'Anda berhasil meminjam buku.');
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

    public function list_absensi_store()
    {
        request()->validate([
            'deskripsi' => ['required']
        ]);
        $jam = Carbon::now()->translatedFormat('H');
        $hari = Carbon::now()->translatedFormat('l');

        if ($hari === 'Sabtu' ) {
            return redirect()->route('list-absensi.index')->with('error', 'Hari ini hari libur.');
        }
        if ($jam < 7 || $jam > 20) {
            return redirect()->route('list-absensi.index')->with('error', 'Batas waktu absen sudah terlewat.');
        }
        $ready = Absen::where('siswa_id',auth()->user()->siswa->id)->whereDate('tanggal',Carbon::now()->translatedFormat('Y-m-d'));
        if($ready->count() > 0)
        {
            return redirect()->route('list-absensi.index')->with('error', 'Anda telah melakukan absen.');
        }
        Absen::create([
            'siswa_id' => auth()->user()->siswa->id,
            'tanggal' => Carbon::now()->translatedFormat('Y-m-d H:i:s'),
            'deskripsi' => request('deskripsi')
        ]);
        return redirect()->route('list-absensi.index')->with('success', 'Anda berhasil melakukan absen.');
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

    public function list_pembayaran_siswa_store()
    {

        request()->validate([
            'pembayaran_asrama_id' => ['required'],
            'bukti' => ['required', 'image'],
            'nominal' => ['required']
        ]);

        $ps = PembayaranSiswa::create([
            'pembayaran_asrama_id' => request('pembayaran_asrama_id'),
            'siswa_id' => auth()->user()->siswa->id,
            'nominal' => request('nominal'),
            'metode_pembayaran_id' => request('metode_pembayaran_id'),
            'bukti' => request()->file('bukti')->store('buktu-pembayaran', 'public')
        ]);

        // send notif
        $bendaharawan = User::where('role', 'bendaharawan')->get();
        if ($bendaharawan->count() > 0) {
            foreach ($bendaharawan as $bend) {
                Notifikasi::create([
                    'pengirim_id' => auth()->id(),
                    'judul' => auth()->user()->name . ' telah melakukan pembayaran asrama pada tahun ajaran ' . $ps->asrama->tahun_ajaran . ' semester ' . $ps->asrama->semester . ' sebesar Rp. ' . number_format($ps->nominal) . ' Silahkan cek dan segeralah approve',
                    'penerima_id' => $bend->id,
                    'status' => 0
                ]);
            }
        }

        return redirect()->route('list-pembayaran-asrama.index')->with('success', 'Bukti Pembayaran berhasil di upload');
    }
}
