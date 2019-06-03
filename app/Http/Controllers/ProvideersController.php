<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
class ProvideersController extends Controller{

    public function index(){
        $providers = Provider::all();
        return view('proveedores.index',compact('providers'));
    }
    public function create(){
        $provider = new Provider;
        return view('proveedores.create',compact('provider'));
    }
    public function store(Request $request){
        $provider = new Provider;
        try{
            $provider->store($request);
            $msj ="El proveedor fue agregado correctamente";
            return redirect('/proveedores')->with("status_success",$msj);
        }catch(Exception $e){
            return redirect("/proveedores")->with("status_warning","Ups,ocurrio un problema.");
        }
    }
    public function show($id){
    
    }
    public function edit($id){
        $provider = Provider::find($id);
        return view('proveedores.edit',compact('provider'));
    }
    public function update(Request $request, $id){
        try{
            $edit = Provider::edit($id,$request);
            $msj = "El proveedor fue actualizado correctamente";
            return redirect("/proveedores")->with("status_success",$msj);
        }catch(Exception $e){
            return redirect("/proveedores")->with("status_warning","Ups,ocurrio un problema.");
        }
    }
    public function destroy($id)
    {
        //
    }
}
