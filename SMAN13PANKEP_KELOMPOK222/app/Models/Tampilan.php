<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tampilan extends Model
{
    protected $table = "tampilan";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','gambar'
    ];    
}
