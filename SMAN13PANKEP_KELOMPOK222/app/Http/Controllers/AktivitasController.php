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
}
