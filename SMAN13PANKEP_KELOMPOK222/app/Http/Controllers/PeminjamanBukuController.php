<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\PeminjamanBuku;
use Illuminate\Http\Request;

class PeminjamanBukuController extends Controller
{
    public function index()
    {
        $items = PeminjamanBuku::latest()->get();
        return view('pages.peminjaman-buku.index', [
            'title' => 'Data Peminjaman Buku',
            'items' => $items
        ]);
    }
}
