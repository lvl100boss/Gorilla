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
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.editProduct', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validate the incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Image is optional during edit
            'category' => 'required|string|max:255',
            'description' => 'string',
            'price' => 'required|integer',
            'discount' => 'nullable|integer',
            'stock' => 'required|integer',
        ]);

        // Handle image upload if new image is provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath; // Update the image path
        }

        // Update the product in the database
        $product->update($validatedData);

        return redirect()->route('admin_products')->with('success', 'Product updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id);
        
        // Set the delete_status to 1 for soft delete
        $product->delete_status = 1;
        $product->save();

        // Redirect back to the products page with a success message
        return redirect()->route('admin_products')->with('success', 'Product soft deleted successfully!');
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

    public function restore($id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id);
        
        // Set the delete_status to 0 to restore the product
        $product->delete_status = 0;
        $product->save();

        // Redirect back to the products page with a success message
        return redirect()->route('admin_products')->with('success', 'Product restored successfully!');
    }

}
