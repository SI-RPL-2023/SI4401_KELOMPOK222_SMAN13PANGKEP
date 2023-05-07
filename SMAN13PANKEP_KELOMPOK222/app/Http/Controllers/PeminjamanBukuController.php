<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\PeminjamanBuku;
use Illuminate\Http\Request;

class PeminjamanBukuController extends Controller
{
    public function index()
    {
        $items = PeminjamanBuku::latest()->get();
        return view('pages.peminjaman-buku.index', [
            'title' => 'Data Peminjaman Buku',
            'items' => $items
        ]);
    }
    public function edit($id)
    {
        $item = PeminjamanBuku::findOrFail($id);
        return view('pages.peminjaman-buku.edit', [
            'title' => 'Edit Peminjaman Buku',
            'item' => $item
        ]);
    }

    public function update($id)
    {

        request()->validate([
            'status' => ['required'],
            'return_date' => ['required']
        ]);
        $item = PeminjamanBuku::findOrFail($id);
        $item->update([
            'return_date' => request('return_date'),
            'status' => request('status')
        ]);

        Notifikasi::create([
            'pengirim_id' => auth()->id(),
            'judul' => auth()->user()->name . ' telah merubah status peminjaman buku dengan judul "' . $item->buku->judul . '" ke status' . $item->status,
            'penerima_id' => $item->siswa->user->id,
            'status' => 0
        ]);

        return redirect()->route('peminjaman-buku.index')->with('success', 'Peminjaman buku berhasil diupdate!');
    }
}
