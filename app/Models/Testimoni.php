<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimoni extends Model
{
    protected $table = 'testimonials';
    use HasFactory;
    protected $fillable = [
        'user_id',
        'pesan',
        'rating',
        'balasan_admin',
    ];
}
