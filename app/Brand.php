<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'marcas';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre'];

    public function store($request){
    	return Brand::create($request->all());
    }
    public static function edit($id,$request){
    	$brand = Brand::find($id);
    	$brand->nombre = $request->nombre;
    	return $brand->save();
    }

}
