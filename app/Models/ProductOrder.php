<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\IsEmpty;

class ProductOrder extends Model
{
    //
    protected $fillable = ['order_id','product_id','amountProduct','totalWithoutDiscount','totalWithDiscount'];
    public function productsOrder()
    {
        return $this->belongsTo(Order::class);
    }

    public static function validarDiscount($articleAmount,$totalWithoutDiscount)
    {
        $totalWithDiscount =0;
        if(($articleAmount >=5 && $articleAmount <=9) && (($totalWithoutDiscount) >= 500)) {
            $totalWithDiscount = ($totalWithoutDiscount) - (($totalWithoutDiscount) *(15 / 100));
        }
        return $totalWithDiscount;

    }
    public static function groupByArticle(Request $request,$orderId)
    {
        # code...
        $productsOrder = array();
        $controle = true;
        for($i=0;$i<count($request->id);$i++){
            if(count($productsOrder) > 0) {
                if(isset($productsOrder[$request->id[$i]])){
                    $productsOrder[$request->id[$i]]->amountProduct = $productsOrder[$request->id[$i]]->amountProduct+1;
                    $productsOrder[$request->id[$i]]->totalWithoutDiscount = $productsOrder[$request->id[$i]]->totalWithoutDiscount+$request->inputArticleTotal[$i];
                }
                else{
                    $productsOrder[$request->id[$i]] = new ProductOrder();
                    $productsOrder[$request->id[$i]]->amountProduct = $productsOrder[$request->id[$i]]->amountProduct+1;
                    $productsOrder[$request->id[$i]]->totalWithoutDiscount = $productsOrder[$request->id[$i]]->totalWithoutDiscount+$request->inputArticleTotal[$i];
                    $productsOrder[$request->id[$i]]->order_id = $orderId;
                    $productsOrder[$request->id[$i]]->product_id = $request->id[$i];
                }
            }
            else
            {
                $productsOrder[$request->id[$i]] = new ProductOrder();
                $productsOrder[$request->id[$i]]->amountProduct = $productsOrder[$request->id[$i]]->amountProduct+1;
                $productsOrder[$request->id[$i]]->totalWithoutDiscount = $productsOrder[$request->id[$i]]->totalWithoutDiscount+$request->inputArticleTotal[$i];
                $productsOrder[$request->id[$i]]->order_id = $orderId;
                $productsOrder[$request->id[$i]]->product_id = $request->id[$i];

            }
        }
        foreach($productsOrder as $productOrder){
            $productOrder->totalWithDiscount = ProductOrder::validarDiscount($productOrder->amountProduct,$productOrder->totalWithoutDiscount);
            if(!$productOrder->save()){
                $controle=false;
            }
        }
        return $controle;
    }

}
