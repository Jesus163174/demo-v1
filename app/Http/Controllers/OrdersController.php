<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Bussine;
use App\Sale;
use App\ProductsOrders;
use Auth;
class OrdersController extends Controller{
    
    public function config(Request $request){
        $order = Order::getOrCreateOrder(\Session::get('order'));
        Order::putOrder($order->id);

        $descuento = $request->descuento;
        $tarjeta   = $request->tarjeta;
        $products  = collect(ProductsOrders::products($order->id));

        $venta     = new Sale($order->id,$products);
        $extra     = 0.00;
        if($tarjeta != null){
            $tarjeta = Bussine::find(Auth::user()->bussine_id)->tarjeta;
            $extra   = ($tarjeta * $venta->subtotal()) / 100;
        }
        else
            $tarjeta = 0.0;
        
        $order->discount = $descuento;
        $order->pay      = $extra;
        $order->save();

        return back();
    }
}
