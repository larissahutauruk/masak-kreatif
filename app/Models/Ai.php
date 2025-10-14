<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ai extends Model
{
    use HasFactory;
    protected $table = 'ai';
    protected $fillable = [
        'user_id',
        'pesan_user',
        'balasan_ai',
    ];

}
