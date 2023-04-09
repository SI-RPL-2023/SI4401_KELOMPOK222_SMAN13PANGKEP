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
        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
}
