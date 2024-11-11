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
            ->where('delete_status', 0)
            ->latest()
            ->paginate(15);
        return view('posts.products', ['products' => $products]);
    }

    
    
   
}
