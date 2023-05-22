<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function index()
    {
        if(auth()->user()->role === 'siswa')
        {
            $items = Notifikasi::where('penerima_id',auth()->user()->id)->latest()->get();
        }
        if(auth()->user()->role === 'pustakawan')
        {
            $items = Notifikasi::where('penerima_id',auth()->user()->id)->latest()->get();
        }
        if(auth()->user()->role === 'bendaharawan')
        {
            $items = Notifikasi::where('penerima_id',auth()->user()->id)->latest()->get();
        }
        if(auth()->user()->role === 'guru')
        {
            $items = Notifikasi::where('penerima_id',auth()->user()->id)->latest()->get();
        }
        if(auth()->user()->role === 'admin')
        {
            $items = Notifikasi::latest()->get();
        }
        return view('pages.notifikasi.index',[
            'title' => 'Notifikasi',
            'items' => $items
        ]);
    }

    public function update()
    {
        $item = Notifikasi::findOrFail(request('id'));
        $item->update([
            'status' => 1
        ]);

        return redirect()->back();
    }
}
