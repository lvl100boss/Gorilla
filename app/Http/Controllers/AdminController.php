<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view(\)
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $products = Product::latest()->paginate(15);
        return view('admin.adminProducts', ['products' => $products]);
    }
    /**
     * Search for products.
     */
    public function searchProducts(Request $request)
    {
        $searchTerm = $request->input('search');
        $products = Product::where('name', 'like', '%' . $searchTerm . '%')
            ->latest()
            ->paginate(15);
        return view('admin.adminProducts', ['products' => $products]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:24048',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'discount' => 'nullable|integer',
            'stock' => 'required|integer',
        ]);
        

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath; // Save the image path
        }

        $product = Product::create([
            'name' => $validatedData['name'],
            'image' => $validatedData['image'],
            'category' => $validatedData['category'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'discount' => $validatedData['discount'],
            'stock' => $validatedData['stock'],
        ]);
        
        return redirect()->route('admin_add_products')->with('success', 'Product added successfully!');

    }
}
