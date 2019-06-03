<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductsOrders;
use App\Order;
use App\Products;
class ProductsOrderController extends Controller{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $request){
        
        $cantidad = $request->cantidad;
        $productoID = $request->productID;
        $orden = Order::find(\Session::get('order'));
        $producto = ProductsOrders::getProduct($orden->id,$productoID);
        if($producto == null ) {
            $producto = Products::find($productoID);
            //verificar que el stock sea mayor a la cantidad que se quiere agreagar
            $agregar['product_id'] = $productoID;
            $agregar['amount']     = $cantidad;
            $agregar['order_id']   = $orden->id;
            $agregar['subtotal']   = ($producto->precio_Venta * $cantidad);
            $agregar['price']      = $producto->precio_Venta;
            $agregar = ProductsOrders::store($agregar);
        }else{
            $actualizar = ProductsOrders::updateOnSale($producto,$cantidad);
        }
        return back();
    }
    public function destroy(Request $request){
        $productoID = $request->productID;
        $orden = Order::find(\Session::get('order'));
        $eliminar = ProductsOrders::deleteOnSale($productoID,$orden->id);

        return back();
    }
}
