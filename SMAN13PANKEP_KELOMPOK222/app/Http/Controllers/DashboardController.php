<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aktivitas;
use App\Models\Buku;
use App\Models\Ekstrakulikuler;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'guru') {
            return redirect()->route('absensi.index');
        }
        if (auth()->user()->role === 'siswa') {
            return redirect()->route('list-pembayaran-asrama.index');
        }
        if (auth()->user()->role === 'pustakawan') {
            return redirect()->route('peminjaman-buku.index');
        }
        if (auth()->user()->role === 'bendaharawan') {
            return redirect()->route('pembayaran-siswa.index');
        }
    }
}
