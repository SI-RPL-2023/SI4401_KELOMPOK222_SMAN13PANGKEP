<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index()
    {
        $items = Absen::latest()->get();
        return view('pages.absen.index',[
            'title' => 'Data Absen',
            'items' => $items
        ]);
    }
    public function create()
    {
        $siswas = Siswa::latest()->get();
        return view('pages.absen.create',[
            'title' => 'Tambah Absen',
            'siswas' => $siswas
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
            'siswa_id' => ['required'],
            'tanggal' => ['required'],
            'deskripsi' => ['required']
        ]);
        $data = $request->all();
        $ready = Absen::where('siswa_id',request('siswa_id'))->whereDate('tanggal',request('tanggal'));
        if($ready->count() < 1)
        {
            Absen::create($data);
        }else{
            return redirect()->route('absensi.index')->with('error','Siswa sudah melakukan absen di tanggal tersebut!');
        }

        return redirect()->route('absensi.index')->with('success','Absen berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $item = Absen::findOrFail($id);
        return view('pages.absen.edit',[
            'title' => 'Edit Absen ' . $item->nama,
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
            'deskripsi' => ['required'],
        ]);
        $data = $request->only('deskripsi');
        $item = Absen::findOrFail($id);
        $item->update($data);

        return redirect()->route('absensi.index')->with('success','Absen berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Absen::findOrFail($id);
        $item->delete();
        return redirect()->route('absensi.index')->with('success','Absen berhasil dihapus!');
    }
}
