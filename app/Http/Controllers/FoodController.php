<?php
namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;


class FoodController extends Controller
{

    public function index()
    {
        $foods = Food::all();
        return view('foods.index', compact('foods'));
    }

    public function create()
    {
        if (!auth()->user()->hasRole('Admin')) {
            abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
        return view('foods.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('food_images', 'public');
        }

        Food::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('foods.index')->with('success', 'Makanan berhasil ditambahkan.');
    }

    public function edit(Food $food)
    {
        if (!auth()->user()->hasRole('Admin')) {
            abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
        return view('foods.edit', compact('food'));
    }

    public function update(Request $request, Food $food)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $food->image; // Gunakan gambar lama jika tidak ada yang baru

        if ($request->hasFile('image')) {
            if ($food->image) {
                Storage::disk('public')->delete($food->image); // Hapus gambar lama
            }
            $imagePath = $request->file('image')->store('food_images', 'public'); // Simpan gambar baru
        }

        $food->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('foods.index')->with('success', 'Makanan berhasil diperbarui.');
    }


    public function destroy(Food $food)
    {
        if ($food->image) {
            Storage::disk('public')->delete($food->image);
        }
        $food->delete();

        return redirect()->route('foods.index')->with('success', 'Makanan berhasil dihapus.');
    }
}
