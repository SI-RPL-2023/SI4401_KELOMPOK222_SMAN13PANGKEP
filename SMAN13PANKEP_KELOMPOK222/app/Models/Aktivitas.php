<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $dates = ['tanggal'];
    public function gambar()
    {
        if($this->gambar)
        {
            return asset('storage/' . $this->gambar);
        }else{
            return asset('assets/backend/vector/pustakawan.png');
        }
    }

}
