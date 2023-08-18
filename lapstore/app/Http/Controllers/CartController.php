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
                $cart[$slug] += $quantity;
            } else {
                $cart[$slug] = $quantity;
            }
            session()->put('cart', $cart);

        } catch (\Throwable $th) {
            throw $th;
        }

        return back()->with('success', 'Item added to cart.');
    }

    public function index(Request $request)
    {
        try {

            $cart = session()->get('cart', []);
            $products = [];
            foreach ($cart as $slug => $item) {
                $product = Product::with('category', 'images')->where('slug', $slug)->first();
                if ($product) {
                    $products[] = $product;
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
        return view('cart', [
            'products' => $products,
        ]);
    }

    public function Remove(Request $request, $slug)
    {
        try {
            $cart = session()->get('cart', []);
            if (isset($cart[$slug])) 
            {
                unset($cart[$slug]);
            }
            session()->put('cart',$cart);
        } catch (\Throwable $th) {
            throw $th;
        }
        return back()->with('success', 'Item removed from cart.');
    }
}