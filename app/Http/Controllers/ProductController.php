<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'rating' => 'nullable|numeric|min:0|max:5',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:255',
            'badge' => 'nullable|string|max:255',
            'badge_class' => 'nullable|string|max:255'
        ]);

        $imagePath = $request->file('image')->store('belanja', 'public');
        $imageName = basename($imagePath);

        Product::create([
            'name' => $request->name,
            'location' => $request->location,
            'description' => $request->description,
            'price' => $request->price,
            'original_price' => $request->original_price,
            'rating' => $request->rating,
            'image' => $imageName,
            'category' => $request->category,
            'badge' => $request->badge,
            'badge_class' => $request->badge_class
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }
        /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.detail_product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.edit_product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Product $product)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'original_price' => 'nullable|numeric|min:0',
        'rating' => 'nullable|numeric|min:0|max:5',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'category' => 'required|string|max:255',
        'badge' => 'nullable|string|max:255',
        'badge_class' => 'nullable|string|max:255'
    ]);

    $data = $request->except('image');

    if ($request->hasFile('image')) {
        // Hanya hapus gambar lama jika bukan default-product.jpg
        if ($product->image && $product->image !== 'default-product.jpg') {
            Storage::disk('public')->delete('belanja/' . $product->image);
        }
        
        // Upload gambar baru
        $imagePath = $request->file('image')->store('belanja', 'public');
        $data['image'] = basename($imagePath);
    }

    $product->update($data);

    return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Product $product)
{
    // Hapus gambar dari storage kecuali jika itu default-product.jpg
    if ($product->image && $product->image !== 'default-product.jpg') {
        Storage::disk('public')->delete('belanja/' . $product->image);
    }
    
    $product->delete();
    
    return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
}
}