<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanBuku extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $dates = ['start_date','return_date'];
    public function siswa()
    {
        return $this->belongsTo(Siswa::class,'siswa_id','id');
    }
    public function buku()
    {
        return $this->belongsTo(Buku::class,'buku_id','id');
    }
}
