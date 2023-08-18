<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    //
    public function addremove(Request $request, $slug)
    {
        try {
            // Get the favourite from the session, or initialize it as an empty arraye
            $favourite = session()->get('favourite', []);
            if (isset($favourite[$slug])) {
                unset($favourite[$slug]);
            } else {
                $favourite[$slug] = true;
            }
            session()->put('favourite', $favourite);

        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect(route('favourite.view'))->with('success', 'Item added to favourite.');

    }
    public function index(Request $request)
    {
        try {

            $favourite = session()->get('favourite', []);
            $products = [];
            foreach ($favourite as $slug => $item) {
                $product = Product::with('category', 'images')->where('slug', $slug)->first();
                if ($product) {
                    $products[] = $product;
                }

            }

        } catch (\Throwable $th) {
            throw $th;
        }
        return view('favourite', [
            'products' => $products,

        ]);
    }
  
}