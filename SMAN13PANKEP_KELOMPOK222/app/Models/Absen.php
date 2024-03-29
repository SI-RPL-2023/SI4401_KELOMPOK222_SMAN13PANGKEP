<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $dates = ['tanggal'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class,'siswa_id','id');
    }
}
