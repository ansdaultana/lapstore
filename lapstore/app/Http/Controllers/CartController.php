<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function Add(Request $request, $slug)
    {
            $quantity = $request->input('quantity', 1);
        try {

            $product = Product::where('slug', $slug)->firstOrFail();
            // Get the cart from the session, or initialize it as an empty arraye
            $cart = session()->get('cart', []);
            if (isset($cart[$slug])) {
                $cart[$slug]['quantity'] += $quantity;
            } else {
                $cart[$slug] = [
                    'product_slug' => $slug,
                    'quantity' => $quantity,
                ];
            }
            session()->put('cart', $cart);

        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->route('products.index')->with('success', 'Item added to cart.');

    }
}