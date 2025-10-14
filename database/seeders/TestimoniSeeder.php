<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimoni;

class TestimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimoni::create([
            'user_id' => 7,
            'pesan' => 'Web-nya keren banget! gampang dipakai.',
            'rating' => 5,
            'balasan_admin' => 'Terima kasih atas testimoninya kak!',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
