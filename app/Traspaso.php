<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Products;
class Traspaso extends Model
{
    public static function procedureIndex(){
        return DB::select('call traspasos');
    }
    public static function procedureAutorizar(){
        return DB::select('call traspasos_autorizar');
    }
    public static function showTraspaso($transferID){
        return DB::select('call traspaso_show(?)',array($transferID));
    }
    public static function products($transferID){
        return DB::select('call traspaso_productos(?)',array($transferID));
    }
    public static function doTransfer($products,$transfer){
        //verificar si el producto ya esta en la sucursal a donde se esta haciendo el traspaso
        foreach($products as $product){
            $productExistencia = Products::issetProductOnBusine($product->producto_id,$transfer,$product->codigo);
            if($productExistencia != false){
                $productExistencia->existencia += $product->cantidad;
                $productExistencia->save();

                $update = Products::find($product->producto_id);
                $update->existencia-=$product->cantidad;
                $update->save();
            }else{
                $toAdd = Products::find($product->producto_id);
                $newProduct = new Products;
                $newProduct->nombre = $toAdd->nombre;
                $newProduct->codigo = $toAdd->codigo;
                $newProduct->existencia = $product->cantidad;
                $newProduct->costo = $toAdd->costo;
                $newProduct->precio_Venta = $toAdd->precio_Venta;
                $newProduct->bussine_id = $transfer->recibe;
                $newProduct->foto = $toAdd->foto;
                $newProduct->categoria_id = $toAdd->categoria_id;
                $newProduct->estatus = $toAdd->estatus;
                $newProduct->iva = $toAdd->iva;
                $newProduct->clave_unidad = $toAdd->clave_unidad;
                $newProduct->clave_producto = $toAdd->clave_producto;
                $newProduct->save();
                $toAdd->existencia -=$product->cantidad;
                $toAdd->save();
            }
        }
        $transfer->estatus = 'autorizado';
        $transfer->save();
    }
}
