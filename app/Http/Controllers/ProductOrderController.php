<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductOrder;
use DateTime;

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

        $order = new Order();
        $order->orderDate = new DateTime();

        //dd($request);
        if($order->save()){
            $order->orderCode =(date('Y-m-').$order->id);
            $order->save();
        }
        if(ProductOrder::groupByArticle($request,$order->id)){
            return ProductOrderController::showOrder($order->id);
        }
        else{
            return false;
        }
    }

    public static function  showOrder($id)
    {
        $order = Order::find($id);
        $productsOrder = $order->productsOrder;
        $totalWithoutDiscount =0;
        $totalWithDiscount = 0;
        $articles = Product::all();
        foreach($productsOrder as $product)
        {
            $totalWithoutDiscount = $product->totalWithoutDiscount + $totalWithoutDiscount;

            if($product->totalWithDiscount == null)
            {
                $totalWithDiscount = $product->totalWithoutDiscount + $totalWithDiscount;
            }
            else
            {
                $totalWithDiscount = $product->totalWithDiscount + $totalWithDiscount;
            }

        }
        return view ('showOrder',[
            'order' => $order,
            'totalWithoutDiscount' => $totalWithoutDiscount,
            'totalWithDiscount' => $totalWithDiscount,
            'productsOrder' => $productsOrder,
            'articles' => $articles
        ]);
    }
    public function listOrder()
    {
        $orders = Order::all();

        return view ('listOrder',[
            'orders' => $orders
        ]);
    }


}
