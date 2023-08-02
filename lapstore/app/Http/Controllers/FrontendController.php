<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function index()
    {
        
        // "https://res.cloudinary.com/ddrivhxfq/image/upload/f_auto,q_auto/qzrvdo3bxb4yd0bigs1u",
        // "https://res.cloudinary.com/ddrivhxfq/image/upload/f_auto,q_auto/rhaojzxt0rbkbjtaw7sl",
        
        $slidder_images = [
            "https://res.cloudinary.com/ddrivhxfq/image/upload/f_auto,q_auto/kamnkc10tzwjngjo00lh",
            "https://res.cloudinary.com/ddrivhxfq/image/upload/f_auto,q_auto/rutkip9kllbmf7mgvqp4",
            "https://res.cloudinary.com/ddrivhxfq/image/upload/f_auto,q_auto/k3puaksoohradi1bfvrm",
        ];
        return view('home', [
            "slidder_images" => $slidder_images
        ]);
    }
}