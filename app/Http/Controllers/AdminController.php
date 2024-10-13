<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // Fetch the latest products with their associated images
        $products = Product::with('images')->latest()->paginate(15);

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
        // Retrieve the product and eager load its images
        $product = Product::with('images')->findOrFail($id);
        
        // Validate the incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:24048', // Updated to match input name
            'category' => 'required|string|max:255',
            'description' => 'nullable|string', // Make description optional
            'price' => 'required|integer',
            'discount' => 'nullable|integer',
            'stock' => 'required|integer',
        ]);

        // Update the product in the database without images first
        $product->update($validatedData);

        // Handle image upload if new images are provided
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('product_images', 'public');

                // Add new images to the product_images table
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $imagePath,
                ]);
            }
        }

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
            'image.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:24048',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'discount' => 'nullable|integer',
            'stock' => 'required|integer',
        ]);
        

        // Handle image upload
        

        $product = Product::create([
            'name' => $validatedData['name'],
            'category' => $validatedData['category'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'discount' => $validatedData['discount'],
            'stock' => $validatedData['stock'],
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('product_images', 'public');
    
                // Save the image path in the product_images table
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $imagePath,
                ]);
            }
        }
        
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
