<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class BukuController extends Controller
{
    public function index()
    {
        $items = Buku::orderBy('judul', 'ASC')->get();
        return view('pages.buku.index', [
            'title' => 'Buku',
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
        return view('pages.buku.create', [
            'title' => 'Tambah buku'
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
        request()->validate([
            'kode' => ['required', 'unique:bukus,kode'],
            'judul' => ['required'],
            'jenis' => ['required'],
            'subjek' => ['required'],
            'deskripsi' => ['required'],
            'gambar' => ['required', 'image']
        ]);

        $data = request()->all();
        $data['gambar'] = request()->file('gambar')->store('buku', 'public');
        Buku::create($data);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

}
