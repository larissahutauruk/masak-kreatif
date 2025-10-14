<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ai;

class AiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ai::create([
            'user_id' => 7,
            'pesan_user' => 'Tolong buatkan resep nasi goreng pakai bahan telur dan sosis',
            'balasan_ai' => 'Berikut resep nasi goreng telur sosis...',
        ]);
    }
}
