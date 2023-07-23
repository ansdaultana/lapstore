<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
 
 public function create(Request $request)
 {


    
    $validate = $request->validate([
        'photos'=>'array|required',
        'photos.*'=>'image'
    ]);
    
    if ($request->file('photos.0')) {
       
        $imageUrl =  'yes';
    }


    return response([ "image" => $imageUrl ?? null,
        "message"=>"request received successfully",
    ],200);
 }
    //
}
