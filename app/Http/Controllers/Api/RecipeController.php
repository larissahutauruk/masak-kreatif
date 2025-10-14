<?php

namespace App\Http\Controllers\Api;

use App\Models\Recipe;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    // Get all recipes
    public function index()
    {
        return response()->json(Recipe::all(), 200);
    }

    // Create new recipe
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_makanan' => 'required|string|max:255',
            'bahan' => 'required|string',
            'alat' => 'required|string',
            'langkah_langkah' => 'required|string',
            'asal' => 'nullable|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('recipes', 'public');
        }

        $recipe = Recipe::create($validated);
        return response()->json($recipe, 201);
    }

    // Get one recipe
    public function show($id)
    {
        $recipe = Recipe::find($id);
        if (!$recipe) {
            return response()->json(['message' => 'Recipe not found'], 404);
        }
        return response()->json($recipe);
    }

    // Update recipe
    public function update(Request $request, $id)
    {
        $recipe = Recipe::find($id);
        if (!$recipe) {
            return response()->json(['message' => 'Recipe not found'], 404);
        }

        $validated = $request->validate([
            'nama_makanan' => 'sometimes|string|max:255',
            'bahan' => 'sometimes|string',
            'alat' => 'sometimes|string',
            'langkah_langkah' => 'sometimes|string',
            'asal' => 'nullable|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($recipe->gambar) {
                Storage::disk('public')->delete($recipe->gambar);
            }
            $path = $request->file('gambar')->store('recipes', 'public');
            $validated['gambar'] = $path;
        }

        $recipe->update($validated);
        return response()->json($recipe, 200);
    }

    // Delete recipe
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        if (!$recipe) {
            return response()->json(['message' => 'Recipe not found'], 404);
        }

        if ($recipe->gambar) {
            Storage::disk('public')->delete($recipe->gambar);
        }

        $recipe->delete();
        return response()->json(['message' => 'Recipe deleted successfully'], 200);
    }
}
