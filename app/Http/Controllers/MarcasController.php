<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
class MarcasController extends Controller{

    public function index(){
        $brands = Brand::all();
        return view('marcas.index',compact('brands'));
    }
    public function create(){
        $brand = new Brand;
        return view('marcas.create',compact('brand'));
    }
    public function store(Request $request){
        $brand = new Brand;
        try {
            $brand->store($request);
            $msj = "La marca ah sido agregada correctamente";
            return redirect('/marcas')->with('status_success',$msj);
        } catch (Exception $e) {
            return redirect('/marcas')->with('status_warning',"Ups,ocurrio un problema");
        }
    }
    public function show($id)
    {
        //
    }
    public function edit($id){
        $brand = Brand::find($id);
        return view('marcas.edit',compact('brand'));
    }
    public function update(Request $request, $id){
        try {
            $edit = Brand::edit($id,$request);
            $msj  = "La marca ah sido actualizada correctamente";
            return redirect('/marcas')->with('status_success',$msj);
        }catch (Exception $e) {
            return redirect('/marcas')->with('status_warning',"Ups,ocurrio un problema");
        }
    }
    public function destroy($id)
    {
        //
    }
}
