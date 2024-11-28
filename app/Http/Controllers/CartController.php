<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
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
        // Get the user's cart // If the user doesn't have a cart, create one
        $cart = Auth::user()->carts()->firstOrCreate([]);

        // Get all cart items with product details
        $cartItems = $cart->cartItems()
                        ->with('product')
                        ->get();

        // Calculate the total price for each cart item
        foreach ($cartItems as $item) {
            $listed_price = $item->product->price - $item->product->discount;
            $item->total_price = $item->quantity * $listed_price;
        }

        return view('user.cart', [
            'cartItems' => $cartItems,
        ]);
    }

    /**
     * Store a newly created cart item.
     */
    public function store(Request $request, $id)
    {
        $fields = $request->validate([
            'size' => ['required', 'string'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        // Get the user's cart or create a new one
        $cart = Auth::user()->carts()->firstOrCreate([]);

        // Check if the product is already in the cart and is unique
        $cartItem = $cart->cartItems()->where('product_id', $id)
                                      ->where('size', $fields['size'])
                                      ->first();
        // dd($cartItem);

        if ($cartItem) {
            // Update the quantity if the product is already in the cart
            $cartItem->quantity += $fields['quantity'];
            $cartItem->save();
        } else {
            // Create a new cart item
            $cart->cartItems()->create([
                'cart_id' => $cart->id,
                'product_id' => $id,
                'size' => $fields['size'],
                'quantity' => $fields['quantity'],
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }

    /**
     * Update the specified cart item.
     */
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'quantity' => 'required|integer|min:1',
    //     ]);

    //     // Find the cart item by product ID
    //     $cartItem = Auth::user()->cartItems()->where('product_id', $id)->first();

    //     if ($cartItem) {
    //         $cartItem->quantity = $request->quantity;
    //         $cartItem->save();

    //         return redirect()->route('cart_page')->with('success', 'Cart updated successfully.');
    //     }

    //     return redirect()->route('cart_page')->with('error', 'Item not found in cart.');
    // }

    /**
     * Remove the specified cart item.
     */
    public function destroy($id)
    {
        // Find the cart item by id
        $cartItem = CartItem::findOrFail($id);

        // Delete the cart item
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }

    public function checkout(Request $request)
    {
        // dd($request);
        // Get the user's cart items with product details
        // validate
        $fields = $request->validate([
            'total_price_w_tax' => ['required', 'numeric'],
        ]);

        // get the user's cart
        $cart = Auth::user()->carts()->first();

        // make a new order
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'total_price' => $fields['total_price_w_tax'],
        ]);

        // get all cart items and pass it into order items
        foreach ($cart->cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'size' => $item->size,
                'total_price' => $fields['total_price_w_tax'],
            ]);
        }

        // Clear cart
        $cart->cartItems()->delete();

        return redirect()->route('cart.index')->with('success', 'Order placed successfully!');
    }

    public function updateQuantity(Request $request, $id)
    {
        $fields = $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);
    
        // Find cart item with product relationship
        $cartItem = CartItem::with('product')->findOrFail($id);
        $cartItem->quantity = $fields['quantity'];
        $cartItem->save();
    
        // Get cart with all items
        $cart = $cartItem->cart()->with('cartItems.product')->first();
    
        // Calculate individual item price correctly
        $itemSubtotal = ($cartItem->product->price - $cartItem->product->discount) * $fields['quantity'];
    
        // Calculate cart totals correctly
        $totalPrice = $cart->cartItems->sum(function($item) {
            return ($item->product->price - $item->product->discount) * $item->quantity;
        });
    
        $shippingFee = 100;
        $before_tax = $totalPrice + $shippingFee;
        $tax = $totalPrice * 0.01;
        $total_price_w_tax = $before_tax + $tax;
        
        
        return response()->json([
            'success' => true,
            'itemCount' => $cart->cartItems->count(),
            'itemSubtotal' => $itemSubtotal, // Individual item total
            'listed_price' => number_format($totalPrice, 2, '.', ','), // Cart subtotal
            'before_tax' => number_format($before_tax, 2, '.', ','),
            'tax' => number_format($tax, 2, '.', ','),
            'total_price_w_tax' => number_format($total_price_w_tax, 2, '.', ','),
        ]);
    }
}
