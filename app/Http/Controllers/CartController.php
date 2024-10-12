<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            // Load the cart from the database for the logged-in user
            $cartItems = Cart::where('user_id', Auth::id())->get();
        } else {
            // Load the cart from the session for guests
            $cartItems = session()->get('cart', []);
        }

        return view('posts.cart', ['cartItems' => $cartItems]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        // Validate the incoming request data
        $fields = $request->validate([
        'product_id' => ['required', 'exists:products,id'],  // Ensures the product ID exists in the products table
        'quantity' => ['required', 'integer', 'min:1'],      // Quantity must be at least 1
    ], [
        'product_id.required' => 'Product is required.',
        'product_id.exists' => 'The selected product does not exist.',
        'quantity.integer' => 'Quantity must be a valid number.',
        'quantity.min' => 'Quantity must be at least 1.',
    ]);

    // Retrieve the product using the validated product_id
    $product = Product::findOrFail($fields['product_id']);

    // Check if the user is authenticated
    if (Auth::check()) {
        // Save the cart in the database for authenticated users
        Cart::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'product_id' => $product->id,
            ],
            [
                'name' => $product->name,
                'image' => $product->image,
                'category' => $product->category,
                'description' => $product->description,
                'price' => $product->price,
                'discount' => $product->discount,
                'stock' => $product->stock,
                'quantity' => $fields['quantity'],  // Use the submitted quantity
            ]
        );

        return redirect()->back()->with('success', 'Product added to your cart!');
    } else {
        
        //EDITED. JUST IN CASE IF WE WANT TO LET THE GUESTS USE ADD TO CART 
        //  // For guests, use session to store the cart
        //  $cart = session()->get('cart', []);

        //  if (isset($cart[$product->id])) {
        //      $cart[$product->id]['quantity']++;
        //  } else {
        //      $cart[$product->id] = [
        //          'name' => $product->name,
        //          'image' => $product->image,
        //          'category' => $product->category,
        //          'description' => $product->description,
        //          'price' => $product->price,
        //          'discount' => $product->discount,
        //          'stock' => $product->stock,
        //          'quantity' => 1,
        //      ];
        //  }

        //  session()->put('cart', $cart);

        //  return redirect()->back()->with('success', 'Product added to your session cart!');

        return redirect()->route('login');
        
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Cart updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart!');
    }
}
