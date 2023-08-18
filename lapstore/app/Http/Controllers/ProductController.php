<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function create(Request $request)
    {
        $slidder = false;
        $recommended = false;


        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'recommended' => 'string',
            'slidder' => 'string',
            'category' => 'required|string|exists:categories,name',
            'quantity' => 'required|integer|min:1',
            'photos' => 'array',
            'photos.*' => 'image'
        ]);

        if (request('recommended') && request('recommended') === "true") {
            $recommended = true;
        }
        if (request('slidder') && request('slidder') === "true") {
            $slidder = true;
        }
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
                'slidder' => $slidder,
                'recommended' => $recommended,
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
            "recommended" => $recommended,
            "slidder" => $slidder,

            "message" => "Product Created Successfully.",
        ], 200);
    }

    public function all(Request $request)
    {


        $validate = $request->validate([
            'perPage' => 'required',
            'currentPage' => 'required',
            'search' => 'nullable|string'
        ]);
        if (auth()->check()) {

            $perPage = $validate['perPage'];
            $currentPage = $validate['currentPage'];
            $search = $validate['search'] ?? '';

            if (!empty($search)) {
                $Products = Product::with('images')
                    ->where(function ($query) use ($search) {
                        $query->where('title', 'like', '%' . $search . '%')
                            ->orWhere('description', 'like', '%' . $search . '%');
                    })
                    ->paginate($perPage, ['*'], 'page', $currentPage);
            } else {
                $Products = Product::with('images')->paginate($perPage, ['*'], 'page', $currentPage);
            }
        }
        return response([
            "Products" => $Products,
            "total" => $Products->total(),
        ]);
    }

    public function get(Request $request)
    {


        $validate = $request->validate([
            "slug" => 'required|string'
        ]);
        if (auth()->check()) {
            $slug = $validate['slug'];
            $Product = Product::with('category', 'images')->where('slug', $slug)->first();

        }
        return response(
            [
                "Product" => $Product
            ]
        );
    }


    public function destroy(Request $request, $slug)
    {

        // $slug = $validate['slug'];

        if (auth()->check()) {
            $product = Product::where('slug', $slug)->first();
            if ($product) {
                $product->delete();
            } else {
                return response([
                    'Unsuccessful' => 'product not found'
                ]);
            }
        }



        return response([
            'Successful' => $slug
        ]);
    }

    public function edit(Request $request, $slug)
    {
        $recommended = false;
        $slidder = false;

        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'recommended' => 'string',
            'slidder' => 'string',
            'category' => 'required|string|exists:categories,name',
            'quantity' => 'required|integer|min:1',
            'photos' => 'array',
            'deletedImages' => 'array',
            'deletedImages*' => 'integer',
            'photos.*' => 'image'
        ]);
        if (request('recommended') && request('recommended') === "true") {
            $recommended = true;
        }
        if (request('slidder') && request('slidder') === "true") {
            $slidder = true;
        }
        if (auth()->check()) {
            $user = auth()->user();
            $category = Category::firstWhere('name', $validate['category']);
            if (!$category) {
                return response(['message' => 'Category not found'], 404);
            }
            $category_id = $category->id;
            $product = Product::where('slug', $slug)->first();
            $product->title = $validate['title'];
            $product->description = $validate['description'];
            $product->price = $validate['price'];
            $product->category_id = $category_id;
            $product->quantity = $validate['quantity'];

            $product->slidder = $slidder;
            $product->recommended = $recommended;
            $product->save();
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
            if (isset($validate['deletedImages']) && is_array($validate['deletedImages'])) {
                foreach ($validate['deletedImages'] as $imageId) {
                    $image = Image::where('id', $imageId)->first();
                    if ($image) {
                        # code...
                        $image->delete();
                    }
                }
            }
        }
        return response([
            'message' => $product
        ]);
    } //


    public function show(Request $request, $slug)
    {

        try {
            $product = Product::with('category', 'images')->where('slug', $slug)->first();
        } catch (\Throwable $th) {

            throw $th;
        }
        return view('product', [
            'product' => $product
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        try {
            $products = Product::with('images')->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%');
            })->get();

        } catch (\Throwable $th) {
            throw $th;
        }
        return view(
            'products',
            [
                'products' => $products,
                'category_name' => 'Results'
            ]
        );
    }

    public function category(Request $request, $slug)
    {
        try {
            $productsQuery = Product::query();
    
            if ($slug !== 'All') {
                $category = Category::where('name', $slug)->first();
                if ($category) {
                    $productsQuery->where('category_id', $category->id);
                }
            }
    
            if (request()->has('sort')) {
                $sort = request()->input('sort');
                if ($sort === 'latest') {
                    $productsQuery->latest();
                } elseif ($sort === 'oldest') {
                    $productsQuery->oldest();
                }
            }
    
            if (request()->has('max_price')) {
                $maxP = request()->input('max_price');
                $productsQuery->where('price', '<=', $maxP);
            }
    
            if (request()->has('min_price')) {
                $minP = request()->input('min_price');
                $productsQuery->where('price', '>=', $minP);
            }
    
            if (request()->has('search')) {
                $search = request()->input('search');
                $productsQuery->where(function ($query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
                });
            }
    
            $products = $productsQuery->with('images')->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    
        return view(
            'products',
            [
                'products' => $products,
                'category_name' => $slug,
            ]
        );
    }
    
}