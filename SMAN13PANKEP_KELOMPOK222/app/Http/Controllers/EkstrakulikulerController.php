<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkstrakulikulerController extends Controller
{
    public function index()
    {
        $items = Ekstrakulikuler::latest()->get();
        return view('pages.ekstrakulikuler.index',[
            'title' => 'Data Ekstrakulikuler',
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
        return view('pages.ekstrakulikuler.create',[
            'title' => 'Tambah Ekstrakulikuler',
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
            'jenis' => ['required'],
            'pelatih' => ['required'],
            'pencapaian' => ['required'],
            'gambar' => ['required','image']
        ]);
        $data = $request->all();
        $data['gambar'] = request()->file('gambar')->store('ekstrakulikuler','public');
        Ekstrakulikuler::create($data);

        return redirect()->route('ekstrakulikuler.index')->with('success','Ekstrakulikuler berhasil ditambahkan!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Ekstrakulikuler::findOrFail($id);
        return view('pages.ekstrakulikuler.edit',[
            'title' => 'Edit Ekstrakulikuler ' . $item->nama,
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
            'jenis' => ['required'],
            'pelatih' => ['required'],
            'pencapaian' => ['required'],
            'gambar' => ['image']
        ]);
        $data = $request->all();
        $item = Ekstrakulikuler::findOrFail($id);
        if (request()->gambar) {
            Storage::disk('public')->delete($item->gambar);
            $data['gambar'] = request()->file('gambar')->store('ekstrakulikuler', 'public');
        } else {
            $data['gambar'] = $item->gambar;
        }
       $item->update($data);

        return redirect()->route('ekstrakulikuler.index')->with('success','Ekstrakulikuler berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Ekstrakulikuler::findOrFail($id);
        Storage::disk('public')->delete($item->gambar);
        $item->delete();
        return redirect()->route('ekstrakulikuler.index')->with('success','Ekstrakulikuler berhasil dihapus!');
    }
}
