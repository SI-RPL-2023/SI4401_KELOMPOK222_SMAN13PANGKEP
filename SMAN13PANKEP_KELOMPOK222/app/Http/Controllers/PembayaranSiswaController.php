<?php

namespace App\Http\Controllers;

use App\Models\MetodePembayaran;
use App\Models\Notifikasi;
use App\Models\PembayaranAsrama;
use App\Models\PembayaranSiswa;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembayaranSiswaController extends Controller
{
    public function index()
    {
        $items = PembayaranSiswa::latest()->get();
        return view('pages.pembayaran-siswa.index',[
            'title' => 'Data Pembayaran siswa',
            'items' => $items
        ]);
    }

    public function create()
    {
       $metode_pembayaran = MetodePembayaran::latest()->get();
       $siswa = Siswa::orderBy('nama','ASC')->get();
       $pembayaran_asrama = PembayaranAsrama::orderBy('tahun_ajaran','DESC')->get();
        return view('pages.pembayaran-siswa.create',[
            'title' => 'Data Pembayaran',
            'siswa' => $siswa,
            'metode_pembayaran' => $metode_pembayaran,
            'pembayaran_asrama' => $pembayaran_asrama
        ]);
    }

    public function store()
    {

        request()->validate([
            'pembayaran_asrama_id' => ['required'],
            'siswa_id' => ['required'],
            'metode_pembayaran_id' => ['required','numeric'],
            'status' => ['required'],
            'bukti' => ['image']
        ]);

        // cek apakah sudah ada
        $cek = PembayaranSiswa::where([
            'pembayaran_asrama_id' => request('pembayaran_asrama_id'),
            'siswa_id' => request('siswa_id')
        ])->count();

        if($cek > 0)
        {
            return redirect()->route('pembayaran-siswa.create')->with('error','Pembayaran Siswa sudah ada.');
        }

        if(request()->file('bukti')){
            $bukti = request()->file('bukti')->store('buktu-pembayaran','public');
        }else{
            $bukti  = NULL;
        }
        $nominal = PembayaranAsrama::find(request('pembayaran_asrama_id'))->first()->nominal;
        PembayaranSiswa::create([
            'pembayaran_asrama_id' => request('pembayaran_asrama_id'),
            'siswa_id' => request('siswa_id'),
            'nominal' => $nominal,
            'metode_pembayaran_id' => request('metode_pembayaran_id'),
            'bukti' => $bukti,
            'status' => request('status')
        ]);


        return redirect()->route('pembayaran-siswa.index')->with('success','Pembayaran Siswa berhasil dibuat.');
    }

    public function edit($id)
    {
        $item = PembayaranSiswa::findOrFail($id);
       $metode_pembayaran = MetodePembayaran::latest()->get();
       $siswa = Siswa::orderBy('nama','ASC')->get();
       $pembayaran_asrama = PembayaranAsrama::orderBy('tahun_ajaran','DESC')->get();
        return view('pages.pembayaran-siswa.edit',[
            'title' => 'Data Pembayaran',
            'siswa' => $siswa,
            'metode_pembayaran' => $metode_pembayaran,
            'pembayaran_asrama' => $pembayaran_asrama,
            'item' => $item
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'metode_pembayaran_id' => ['required','numeric'],
            'status' => ['required'],
            'bukti' => ['image']
        ]);

        $item = PembayaranSiswa::findOrFail($id);
        if(request()->file('bukti')){
            $bukti = request()->file('bukti')->store('buktu-pembayaran','public');
        }else{
            $bukti  = $item->bukti;
        }
        $item->update([
            'metode_pembayaran_id' => request('metode_pembayaran_id'),
            'bukti' => $bukti,
            'status' => request('status')
        ]);

        Notifikasi::create([
            'pengirim_id' => auth()->id(),
            'judul' => auth()->user()->name . ' telah merubah status pembayaran asrama pada tahun ajaran ' . $item->asrama->tahun_ajaran . ' semester ' . $item->asrama->semester . ' dengan nominal Rp.' . number_format($item->nominal) . ' ke status ' . $item->status,
            'penerima_id' => $item->siswa->user->id,
            'status' => 0
        ]);



        return redirect()->route('pembayaran-siswa.index')->with('success','Pembayaran Siswa berhasil diupdate.');
    }

    public function download($id)
    {
        $item = PembayaranSiswa::findOrFail($id);
        if($item->bukti)
        {
            return Storage::disk('public')->download($item->bukti);
        }
        return redirect()->route('pembayaran-siswa.index')->with('error','Tidak ada bukti pembayaran');
    }

    public function destroy($id)
    {
        $item = PembayaranSiswa::findOrFail($id);
        $item->delete();
        return redirect()->route('pembayaran-siswa.index')->with('success','Pembayaran Siswa berhasil dihapus.');
    }
}
