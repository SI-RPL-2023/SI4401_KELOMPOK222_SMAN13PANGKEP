<?php

namespace App\Http\Controllers;

use App\Models\MetodePembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MetodePembayaranController extends Controller
{
    public function index()
    {
        $items = MetodePembayaran::orderBy('nama','asc')->get();
        return view('pages.metode-pembayaran.index',[
            'title' => 'Data Metode Pembayaran',
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.metode-pembayaran.create',[
            'title' => 'Tambah Metode Pembayaran',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required'],
            'nomor' => ['required','numeric'],
            'deskripsi' => ['required']
        ]);
        $data = $request->all();

        MetodePembayaran::create($data);

        return redirect()->route('metode-pembayaran.index')->with('success','Metode Pembayaran berhasil ditambahkan!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = MetodePembayaran::findOrFail($id);
        return view('pages.metode-pembayaran.edit',[
            'title' => 'Edit Metode Pembayaran ' . $item->nama,
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'nama' => ['required'],
            'nomor' => ['required','numeric'],
            'deskripsi' => ['required']
        ]);
        $data = $request->all();
        $item = MetodePembayaran::findOrFail($id);
       $item->update($data);

        return redirect()->route('metode-pembayaran.index')->with('success','Metode Pembayaran berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = MetodePembayaran::findOrFail($id);
        $item->delete();
        return redirect()->route('metode-pembayaran.index')->with('success','Metode Pembayaran berhasil dihapus!');
    }
}
