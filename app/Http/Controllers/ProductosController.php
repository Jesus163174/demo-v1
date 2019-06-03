<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Category;
use App\Bussine;
use App\Brand;
use App\Provider;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use SoapClient;
use SoapFault;
class ProductosController extends Controller
{
    public function index(){
        
        
        /*$client = new SoapClient('https://www.foliosdigitalespac.com/WSTimbrado33Test/WSCFDI33.svc?WSDL');
        $param = array('usuario' => "MERF780418D33",'password' => "contRa$3na",'cadenaXML' => "Su_XML_String",'referencia' => "0001");
        $error = 0;
        try{
            $result= $client->__call("TimbrarCFDI", array($param)); 
        }catch(Exception $e){
            dd($e);
        }
        
        

        
        return response()->json($result);*/

        $product = new Products();
        $products = $product->procedureIndex();
        return view('productos.index',compact('products'));
    }
    public function create(){
        $bussines = Bussine::all();
        $categories = Category::all();
        $brands     = Brand::all();
        $providers  = Provider::all();
        return view('productos.create',compact('bussines','categories','brands','providers'));
    }
    public function store(Request $request){
        $img = $request->file('foto');
        $name = 'producto.png';
        if(!empty($img)){
            $rand = rand(1,1000);
            $name = 'producto_'.Carbon::now()->format('Y-m-d').$rand.'.'.$img->getClientOriginalExtension();
            Storage::disk('local')->put($name,file_get_contents($img));
        }
        $response = Products::store($request,$name);
        $msj = "El producto fue agregado correctamente";
        return redirect('productos')->with('status_success',$msj);
    }
    public function show($idProduct){
        $product = Products::procedureShow($idProduct);
        $product = collect($product)->first();
        return view('productos.show',compact('product'));
    }
    public function edit($idProduct){
        $product = Products::procedureShow($idProduct);
        $product = collect($product)->first();
        $categories = Category::procedureIndex();
        $bussines   = Bussine::procedureIndex();

        $brands     = Brand::all();
        $providers  = Provider::all();
        return view('productos.edit',compact('product','categories','bussines','brands','providers'));
    }
    public function update(Request $request, $id){
        try {
            $product = Products::updateProduct($request,$id);
            $msj = "Este producto fue actualizado correctamente";
            return redirect('/productos/'.$id)->with('status_success',$msj);
        }catch(Exception $e){
            return back()->with('status_danger',$e);
        }
    }
    public function destroy($id){
        try{
            $product = Products::find($id);
            $product->estatus = 'eliminado';
            $product->save();
            $msj = "El producto fue dado de baja correctamente";
            return back()->with('status_success',$msj);
        }catch(Exception $e){
            return back()->with('status_danger',$e);
        }
        
    }
}
