<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function create(Request $request)
    {



        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|exists:categories,name',
            'quantity' => 'required|integer|min:1',
            'photos' => 'array',
            'photos.*' => 'image'
        ]);

        if (auth()->check()) {
            $user = auth()->user();
            $validate['user_id'] = $user->id;
            $category = Category::firstWhere('name', $validate['category']);
            if (!$category) {
                return response(['message' => 'Category not found'], 404);
            }
            $category_id = $category->id;
            $product = Product::create([
                'user_id' => $validate['user_id'],
                'title' => $validate['title'],
                'description' => $validate['description'],
                'price' => $validate['price'],
                'category_id' => $category_id,
                'quantity' => $validate['quantity'],
                'created_by' => $validate['user_id']
            ]);

            if (request()->has('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $uploadedImage = $photo->storeOnCloudinary();
                    $imageUrl = $uploadedImage->getSecurePath();
                    $imageUrl = Image::create([
                        'product_id' => $product->id,
                        'image_url' => $imageUrl
                    ]);
                }

            }


        }
        return response([
            "image" => $imageUrl ?? null,
            "message" => "Product Created Successfully.",
        ], 200);
    }
    //
}