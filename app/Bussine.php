<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Bussine extends Model{
    
    protected $fillable = ['nombre','calle','colonia','estado','ciudad','pais','numero_interior','numero_exterior','caja','tarjeta','comision_taller'];

    public static function procedureIndex(){
    	return DB::select('call get_bussines_index');
    }
    public static function store($request){
    	return Bussine::create($request);
    }
    public static function updat($request,$id){
    	$busine = Bussine::find($id);
    	$busine->nombre = $request->nombre;
    	$busine->calle = $request->calle;
    	$busine->colonia = $request->colonia;
    	$busine->estado = $request->estado;
    	$busine->ciudad = $request->ciudad;
    	$busine->pais = $request->pais;
    	$busine->numero_interior = $request->numero_interior;
    	$busine->numero_exterior = $request->numero_exterior;
    	$busine->caja = $request->caja;
    	$busine->tarjeta = $request->tarjeta;
    	$busine->comision_taller = $request->comision_taller;
    	return $busine->save();
    }
}
