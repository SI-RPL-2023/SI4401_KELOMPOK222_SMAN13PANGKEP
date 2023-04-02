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

}
