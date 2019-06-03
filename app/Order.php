<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Carbon\Carbon;
class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $fillable = ['user_id','bussine_id','pay','discount','date','subtotal','status'];

    public static function getOrCreateOrder($order){
        if($order)
            return Order::getOrder($order);
        else
            return Order::createOrder();
    }
    public static function createOrder(){
        return Order::create([
            'user_id'=>Auth::user()->id,
            'bussine_id'=>Auth::user()->bussine_id,
            'pay'=>0.0,
            'discount'=>0.0,
            'date'=>Carbon::now()->format('Y-m-d'),
            'subtotal'=>0.0,
            'status'=>'proceso'
        ]);
    }
    public static function getOrder($order){
        return Order::find($order);
    }
    public static function putOrder($order){
        \Session::put('order',$order);
    }

    
}
