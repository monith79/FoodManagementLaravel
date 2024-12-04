<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
        ]);

        // Retrieve the cart from the session or initialize an empty array
        $cart = session()->get('cart', []);

        // Check if the item is already in the cart
        if (isset($cart[$request->id])) {
            // Update quantity if item exists
            $cart[$request->id]['quantity'] += $request->quantity;
        } else {
            // Add new item to the cart
            $cart[$request->id] = [
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
            ];
        }

        // Save the cart back to the session
        session()->put('cart', $cart);

        // Redirect or return a response
        return redirect()->route('cuisines.index')->with('success', 'Item added to cart successfully.');
    }

    public function index()
    {
        // Retrieve the cart from the session
        $cart = session()->get('cart', []);

        return view('cart.index', compact('cart'));
    }
    
    public function remove($id)
    {
        // Retrieve the cart from the session
        $cart = session()->get('cart', []);

        // Remove the item from the cart
        unset($cart[$id]);

        // Save the updated cart to the session
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Item removed from cart successfully.');
    }


}
