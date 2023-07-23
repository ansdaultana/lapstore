<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
 
 public function create(Request $request)
 {


    
    $validate = $request->validate([
        'images' => 'array',
    ]);
   $imageUrls = $request->input('images');
    
    return response([
        "images" => $imageUrls,
        "message"=>"request received successfully",
    ],200);
 }
    //
}
