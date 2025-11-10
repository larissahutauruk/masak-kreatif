<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua resep dari tabel recipes
        $recipes = Recipe::all();

        // Kirim data ke view home.blade.php
        return view('home', compact('recipes'));
    }
}
