<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
class Products extends Model{

	protected $table = 'inventarios';
	protected $primaryKey = 'id';

	public  function procedureIndex(){
		return DB::select('call get_products_index');
    }
	public static function procedureShow($idProduct){
		return DB::select('call get_product_show(?)',array($idProduct));
	}
    public static function store($request,$foto){
       return DB::table('inventarios')->insert(
            [
                'nombre'=>$request->nombre,
                'codigo'=>$request->codigo,
                'existencia'=>$request->existencia,
                'costo'=>$request->costo,
                'precio_Venta'=>$request->precio_Venta,
                'bussine_id'=>$request->bussine_id,
                'categoria_id'=>$request->categoria_id,
                'iva'=>$request->iva,
                'clave_unidad'=>$request->clave_unidad,
                'clave_producto'=>$request->clave_producto,
                'created_at'=>now(),
                'foto'=>$foto,
                'brand_id'=>$request->brand_id,
                'provider_id'=>$request->provider_id
            ]
        ); 
    }
	public static function updateProduct($request, $idProduct){
		return DB::table('inventarios')->where('id',$idProduct)->update(
            [
                'nombre'=>$request->nombre,
                'codigo'=>$request->codigo,
                'existencia'=>$request->existencia,
                'costo'=>$request->costo,
                'precio_Venta'=>$request->precio,
                'bussine_id'=>$request->bussine_id,
                'categoria_id'=>$request->categoria_id,
                'iva'=>$request->iva,
                'clave_unidad'=>$request->clave_unidad,
                'clave_producto'=>$request->clave_producto,
                'brand_id'=>$request->brand_id,
                'provider_id'=>$request->provider_id  
            ]
     	);
    }
    public static function procedureByBusine(){
        return DB::select('call get_product_by_bussine(?)',array(Auth::user()->bussine_id));
    }
    public static function issetProductOnBusine($product,$transfer,$code){
        $product = Products::find($product);
        $count = Products::where([['codigo',$code],['bussine_id',$product->bussine_id]])->first();
        if(count($count) != 0)
            return $count;
        return false;

    }

}
