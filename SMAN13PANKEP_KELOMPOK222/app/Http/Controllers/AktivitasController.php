<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AktivitasController extends Controller
{
    public function index()
    {
        $items = Aktivitas::latest()->get();
        return view('pages.aktivitas.index',[
            'title' => 'Data Aktivitas',
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
        return view('pages.aktivitas.create',[
            'title' => 'Tambah Aktivitas',
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
            'tanggal' => ['required'],
            'judul' => ['required'],
            'deskripsi' => ['required'],
            'kontak_person' => ['required'],
            'gambar' => ['required','image']
        ]);

        $data = $request->all();
        $data['gambar'] = request()->file('gambar')->store('aktivitas','public');
        Aktivitas::create($data);

        return redirect()->route('aktivitas.index')->with('success','Aktivitas berhasil ditambahkan!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Aktivitas::findOrFail($id);
        return view('pages.aktivitas.edit',[
            'title' => 'Edit Aktivitas ' . $item->nama,
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
            'tanggal' => ['required'],
            'judul' => ['required'],
            'deskripsi' => ['required'],
            'kontak_person' => ['required'],
            'gambar' => ['image']
        ]);

        $data = $request->all();
        $item = Aktivitas::findOrFail($id);
        if (request()->gambar) {
            Storage::disk('public')->delete($item->gambar);
            $data['gambar'] = request()->file('gambar')->store('aktivitas', 'public');
        } else {
            $data['gambar'] = $item->gambar;
        }
       $item->update($data);

        return redirect()->route('aktivitas.index')->with('success','Aktivitas berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Aktivitas::findOrFail($id);
        Storage::disk('public')->delete($item->gambar);
        $item->delete();
        return redirect()->route('aktivitas.index')->with('success','Aktivitas berhasil dihapus!');
    }
}

}
