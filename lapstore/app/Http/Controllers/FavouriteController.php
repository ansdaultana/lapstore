<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    //
    public function AddorRemove(Request $request, $slug)
    {
        try {
            // Get the favourite from the session, or initialize it as an empty arraye
            $favourite = session()->get('favourite', []);
            if (in_array($slug, $favourite)) {
                $favourite = array_diff($favourite, [$slug]);
            } else {
                $favourite[] = $slug;
            }
            session()->put('favourite', $favourite);

        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect()->route('products.index')->with('success', 'Item added to favourite.');

    }
}