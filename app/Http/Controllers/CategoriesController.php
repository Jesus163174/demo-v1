<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoriesController extends Controller{

    public function index(){
        $categories = Category::procedureIndex();
        return view('categorias.index',['categories'=>$categories]);
    }
    public function create(){
        $category = new Category;
        $button = "Agregar categoria";
         $url = 'categorias/';
        return view('categorias.create',['category'=>$category,'button'=>$button,'url'=>$url]);
    }
    public function store(Request $request){
        $category = new Category;
        $category->nombre = $request->nombre;
        $category->save();
        $msj ="La categoria fue agregada exitosamente";
        return redirect('categorias')->with('status_success',$msj);
    }
    public function show($id){
        $category = Category::find($id);
    }
    public function edit($id)
    {
        $category = Category::find($id);
        $url = 'categorias/'.$id;
        $button = "Actualizar categoria";
        return view('categorias.create',['category'=>$category,'button'=>$button,'url'=>$url]);
    }
    public function update(Request $request, $id){
        $category = Category::find($id);
        $category->nombre = $request->nombre;
        $category->save();
        $msj ="La categoria fue actualizada exitosamente";
        return redirect('categorias')->with('status_success',$msj);
    }
    public function destroy($id)
    {
        //
    }
}
