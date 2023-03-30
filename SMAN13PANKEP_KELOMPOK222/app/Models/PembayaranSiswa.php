<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranSiswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function asrama()
    {
        return $this->belongsTo(PembayaranAsrama::class,'pembayaran_asrama_id','id');
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class,'siswa_id','id');
    }
    public function metodepembayaran()
    {
        return $this->belongsTo(MetodePembayaran::class,'metode_pembayaran_id','id');
    }
}
