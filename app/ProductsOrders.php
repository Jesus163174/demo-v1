<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Products;
class ProductsOrders extends Model{
    
    protected $table = 'product_orders';
    protected $primaryKey = 'id';

    protected $fillable = ['order_id','product_id','price','subtotal','amount'];

    public static function products($order){
        return DB::select('call get_products_order(?)',array($order));
    }
    public static function getProduct($orderID,$productID){
       $product = ProductsOrders::getProductOnSale($orderID,$productID);
       return $product;
    }
    public static function getProductOnSale($orderID,$productID){
        return ProductsOrders::where([['order_id',$orderID],['product_id',$productID]])->first();
    }
    public static function store($add){
        return ProductsOrders::create($add);
    }
    public static function updateOnSale($product,$amount){
        $producto = Products::find($product->product_id);
        if($producto->stock >= ($product->amount + $amount)){
            $product->amount += $amount;
            $product->subtotal = ($product->price*$product->amount);
            return $product->save();
        }else{
            return false;
        }
    }
    public static function deleteOnSale($productID,$order){
        return ProductsOrders::where([['order_id',$order],['product_id',$productID]])->delete();
    }
}
