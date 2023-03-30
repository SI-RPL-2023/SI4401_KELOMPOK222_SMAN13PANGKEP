<?php

namespace App\Http\Controllers;

use App\Models\MetodePembayaran;
use App\Models\Notifikasi;
use App\Models\PembayaranAsrama;
use App\Models\PembayaranSiswa;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembayaranSiswaController extends Controller
{
    public function index()
    {
        $items = PembayaranSiswa::latest()->get();
        return view('pages.pembayaran-siswa.index',[
            'title' => 'Data Pembayaran siswa',
            'items' => $items
        ]);
    }
}
