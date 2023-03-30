<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranAsrama extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function checkPembayaran($pembayaran_asrama_id, $siswa_id)
    {
        $pembayaran = PembayaranSiswa::where([
            'pembayaran_asrama_id' => $pembayaran_asrama_id,
            'siswa_id' => $siswa_id
        ])->first();

        if($pembayaran)
        {
            return $pembayaran->status;
        }
    }
}
