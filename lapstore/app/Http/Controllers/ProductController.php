<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
 
 public function create(Request $request)
 {

    
    $validate = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'slidder' => 'boolean',
        'category' => 'required|string',
        'quantity' => 'required|integer|min:1',
        'photos' => 'array',
        'photos.*' => 'image|mimes:jpeg,png|max:2048', 
    ]);
    return response([
        "message"=>"request received successfully",
    ],200);
 }
    //
}
