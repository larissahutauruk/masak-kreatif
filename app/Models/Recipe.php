<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_masakan',
        'bahan',
        'alat',
        'langkah_langkah',
        'asal',
        'gambar',
        'rating',
    ];
}
