<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index()
    {
        # code...
        $products = Product::all();;

        return view('createProduct',[
            'products' => $products
            ]
        );
    }
}
