<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display the user's cart items.
     */
    public function index()
    {
        // Get the user's cart items with product details
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        return view('posts.cart', [
            'cartItems' => $cartItems, // Pass cart items to the view, products included
        ]);
    }

    /**
     * Store a newly created cart item.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'exists:products,id'], // Ensure the product exists
            'quantity' => ['required', 'integer', 'min:1'], // Ensure quantity is valid
        ]);

        // Check if the product is already in the user's cart
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            // Update quantity if product exists in the cart
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Create a new cart item if product is not in the cart
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->route('cart_page')->with('success', 'Product added to cart successfully.');
    }

    /**
     * Update the specified cart item.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Find the cart item by product ID
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity = $request->quantity;
            $cartItem->save();

            return redirect()->route('cart_page')->with('success', 'Cart updated successfully.');
        }

        return redirect()->route('cart_page')->with('error', 'Item not found in cart.');
    }

    /**
     * Remove the specified cart item.
     */
    public function destroy($id)
    {
        // Find the cart item by product ID
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->first();

        if ($cartItem) {
            $cartItem->delete();

            return redirect()->route('cart_page')->with('success', 'Item removed from cart successfully.');
        }

        return redirect()->route('cart_page')->with('error', 'Item not found in cart.');
    }
}
