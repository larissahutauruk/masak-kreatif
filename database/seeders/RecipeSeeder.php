<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recipe;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recipe::insert([
            [
                'nama_makanan' => 'Rawon',
                'bahan' => 'Daging sapi, kluwek, serai, daun salam, bawang merah, bawang putih, lengkuas, garam, gula',
                'alat' => 'Blender/cobek, Panci besar, Pisau dan talenan, Sendok sayur, Kompor',
                'langkah_langkah' => 'Rebus daging sapi hingga empuk, haluskan bumbu termasuk kluwek lalu tumis. | Masukkan tumisan ke rebusan daging, beri daun salam dan serai. | Masak hingga kuah hitam pekat dan harum.',
                'asal' => 'Surabaya, Jawa Timur',
                'gambar' => '',
                'rating' => 4.2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_makanan' => 'Rujak Cingur',
                'bahan' => 'Cingur sapi, tempe, tahu, lontong, kangkung, tauge, kacang panjang, bumbu petis, kacang tanah, cabai, pisang muda',
                'alat' => 'Cobek/ulekan besar (untuk saus kacang), Pisau tajam, Talenan, Mangkuk besar untuk mencampur, Parutan (untuk mengkuk)',
                'langkah_langkah' => 'Rebus sayuran, goreng tahu dan tempe. | Haluskan bumbu kacang dengan petis dan cabai, tambahkan pisang muda. | Campur semua bahan lalu siram dengan bumbu. ',
                'asal' => 'Surabaya, Jawa Timur',
                'gambar' => '',
                'rating' => 3.9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_makanan' => 'Soto Lamongan',
                'bahan' => 'Ayam kampung, serai, daun jeruk, kunyit, bawang putih, bawang merah, kemiri, koya (kerupuk + bawang goreng)',
                'alat' => 'Blender/cobek (untuk bumbu), Panci besar, Wajan (untuk menumis), Pisau dan talenan, Sendok sayur, Saringan/serok',
                'langkah_langkah' => 'Rebus ayam hingga empuk, angkat dan suwir dagingnya. | Tumis bumbu halus, masukkan ke kuah rebusan ayam. | Sajikan dengan suwiran ayam, koya, dan sambal.',
                'asal' => 'Lamongan, Jawa Timur',
                'gambar' => '',
                'rating' => 4.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_makanan' => 'Tahu Tek',
                'bahan' => 'Tahu goreng setengah matang, lontong, tauge, kentang goreng, telur dadar, bumbu kacang petis, kerupuk',
                'alat' => 'Wajan untuk menggoreng, Cobek/ulekan (untuk bumbu kacang), Pisau, Serok/spatula, Piring saji',
                'langkah_langkah' => 'Potong tahu goreng, lontong, kentang, dan telur dadar. | Campur dengan tauge. | Siram dengan bumbu kacang petis lalu taburi kerupuk.',
                'asal' => 'Surabaya, Jawa Timur',
                'gambar' => '',
                'rating' => 3.2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_makanan' => 'Lontong Balap',
                'bahan' => 'Lontong, tahu goreng, tauge rebus, lentho (kacang tolo goreng), sambal petis, bawang goreng',
                'alat' => 'Panci kukus (untuk lontong), Cobek besar (untuk bumbu kacang), Wajan untuk menumis, Pisau dan talenan, Mangkuk saji, Sendok sayur',
                'langkah_langkah' => 'Siapkan lontong, tahu goreng, tauge rebus, dan lentho. | Siram dengan kuah kaldu, tambahkan sambal petis dan taburan bawang goreng.',
                'asal' => 'Surabaya, Jawa Timur',
                'gambar' => '',
                'rating' => 4.6,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
