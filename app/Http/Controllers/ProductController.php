<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('delete_status', 0)->latest()->paginate(8);
        return view('posts.index', ['products' => $products]);
    }

    public function show()
    {
        $products = Product::where('delete_status', 0)->latest()->paginate(15);
        return view('posts.products', ['products' => $products]);
    }

    public function searchProducts(Request $request)
    {
        $searchTerm = $request->input('search');
        $products = Product::where('name', 'like', '%' . $searchTerm . '%')
            ->latest()
            ->paginate(15);
        return view('posts.products', ['products' => $products]);
    }

    //EDITED.
    //function to get single product to view full product's details
    public function show_detail($id)
    {
        $product = Product::find($id);
        
        if ($product) {
            return view('posts.preview', ['product' => $product]);
        }

        return redirect()->back()->with('error', 'Product not found');
    }
    
   
}
