<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'proveedores';
    protected $primaryKey =  'id';
    protected $fillable = ['nombre','email','celular'];

    public function store($request){
    	return Provider::create($request->all());
    }

    public static function edit($id,$request){
    	$provider = Provider::find($id);
    	$provider->nombre = $request->nombre;
    	$provider->email = $request->email;
    	$provider->celular = $request->celular;
    	return $provider->save();
    }
}
