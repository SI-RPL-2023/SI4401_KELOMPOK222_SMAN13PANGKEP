<?php

namespace App\Http\Controllers;

use App\Models\PembayaranAsrama;
use Illuminate\Http\Request;

class PembayaranAsramaController extends Controller
{
    public function index()
    {
        $items = PembayaranAsrama::latest()->get();
        return view('pages.pembayaran-asrama.index',[
            'title' => 'Data Pembayaran Asrama',
            'items' => $items
        ]);
    }
}
