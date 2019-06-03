<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;
class Sale extends Model
{
	protected $table = 'ventas';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','order_id','total','discout','pay','tSale','status','date','cliente_id'];
    
    public function __construct($order,$products){
        $this->order = $order;
        $this->products = $products;
    }
    public static function countSales(){
        return DB::select('select count(*) ventas from ventas where status = "pagado" ');
    }
    public function subtotal(){
        return $this->products->sum('subtotal');
    }
    public function descuento(){
        return ($this->subtotal() * $this->order->discount) /100;
    }
    public static function generateFolio($busineID){
        $folio_ultimo =  DB::table('ventas')->join('orders','ventas.order_id','orders.id')->where('orders.bussine_id',$busineID)->orderBy('ventas.folio','desc')->first();
        if($folio_ultimo != null)
            return $folio_ultimo->folio+1;
        return 1;
    }
    public function store($add){
        return DB::table('ventas')->insert(
            [
                'user_id'=>$add['user_id'],
                'order_id'=>$add['order_id'],
                'total'=>$add['total'],
                'discount'=>$add['discount'],
                'pay'=>$add['pay'],
                'tSale'=>$add['tSale'],
                'cliente_id'=>$add['cliente_id'],
                'date'=>$add['date'],
                'folio'=>$add['folio'],
                'created_at'=>Carbon::now()
            ]
        );
    }
    public function removeExistence($products){
        foreach($products as $product){
            $remove = Products::find($product->id);
            $remove->existencia-=$product->amount;
            $remove->save();
        }
    }
	public static function procedureIndex(){
		return DB::select('call get_sales_index');
	}
    public static function ProcedureChartWeekend(){
    	return DB::select('call grafica_ventas_index');
    }
    public static function totals(){
        return DB::select('call get_total_general()');
    }
    public static function totalsShow($saleID){
        return DB::select('call get_total_show(?)',array($saleID));
    }
    public function scopeFilter($query,$request){
    	return $query->filterByBussine($request->sucursal)->filterBySeller($request->vendedor)->betweenDate($request->fecha1,$request->fecha2)->filterByStatus($request->estatus)->orderByFolio();
    }
    public function scopeFilterByBussine($query,$bussine){
    	return $query->join('orders','ventas.order_id','orders.id')
    	->join('bussines','orders.bussine_id','bussines.id')
    	->where('bussines.nombre','LIKE',"%$bussine%");
    }
    public function scopeFilterBySeller($query,$seller){
    	return $query->join('users','orders.user_id','users.id')
    	->where('users.name','LIKE',"%$seller%");
    }
    public function scopeBetweenDate($query,$date1,$date2){
    	return $query->whereBetween('ventas.date',[$date1,$date2]);
    }
    public function scopeFilterByStatus($query,$status){
    	return $query->where('ventas.status','LIKE',"%$status%");
    }
    public function scopeOrderByFolio($query){
    	return $query->orderBy('ventas.id','DESC');
    }
    public function scopeSelectData($query){
    	return $query->select('ventas.id','ventas.total','bussines.nombre as bussine','users.name as seller','ventas.status','ventas.date as fecha');
    }
    public static function showSale($saleID){
        return DB::select('call show_sale(?)',array($saleID));
    }
    public static function ticket($folio){
        return DB::select('call get_ticket(?)',array($folio));
    }

}
