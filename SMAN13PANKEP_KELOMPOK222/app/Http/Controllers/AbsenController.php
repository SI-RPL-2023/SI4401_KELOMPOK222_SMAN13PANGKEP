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
}
