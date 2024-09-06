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
        $products = Product::latest()->paginate(8);
        return view('posts.index', ['products' => $products]);
    }

    public function show()
    {
        $products = Product::latest()->paginate(15);
        return view('posts.products', ['products' => $products]);
    }

    
    

    
}
