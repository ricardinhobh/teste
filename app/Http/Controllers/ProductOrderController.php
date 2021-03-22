<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductOrderController extends Controller
{

    //
    public function index()
    {
        # code...
        $products = Product::all();
        //dd($products);
        return view('createOrder',[
            'products' => $products
        ]);
    }
    public function create()
    {
        $products = Product::all();
        //dd($products);
        return view('createOrder',[
            'products' => $products
        ]);
    }
    public function store(Request $request)
    {
        dd($request);
    }


}
