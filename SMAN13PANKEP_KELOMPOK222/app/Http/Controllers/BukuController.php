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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Buku::findOrFail($id);
        return view('pages.buku.edit', [
            'title' => 'Edit buku',
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'kode' => ['required', Rule::unique('bukus', 'kode')->ignore($id)],
            'judul' => ['required'],
            'jenis' => ['required'],
            'subjek' => ['required'],
            'deskripsi' => ['required'],
            'gambar' => ['image']
        ]);

        $data = request()->all();
        $item = Buku::findOrFail($id);
        if (request()->gambar) {
            Storage::disk('public')->delete($item->gambar);
            $data['gambar'] = request()->file('gambar')->store('buku', 'public');
        } else {
            $data['gambar'] = $item->gambar;
        }
        $item->update($data);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Buku::findOrFail($id);
        Storage::disk('public')->delete($item->gambar);
        $item->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}
