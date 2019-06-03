<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Bussine;
use App\User;
use App\Order;
use App\ProductsOrders;
use App\Products;
use App\Cliente;
use Carbon\Carbon;
use DB;
use Auth;
class VentasController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
        $totales = Sale::totals();
        $totales = collect($totales)->first();
        $sales   = Sale::procedureIndex();
        $bussines   = Bussine::procedureIndex();
        $sellers    = User::procedureIndex();
        $sales_char = Sale::ProcedureChartWeekend();
        return view('ventas.index',compact('sales','totales','bussines','sellers','sales_char'));
    }
    public function filter(Request $request){
        $sales   = Sale::filter($request)->selectData()->get();
        $totales = Sale::totals();
        $totales = collect($totales)->first();
        $bussines   = Bussine::procedureIndex();
        $sellers    = User::procedureIndex();
        $sales_char = Sale::ProcedureChartWeekend();
        return view('ventas.index',compact('sales','totales','bussines','sellers','sales_char'));
    }
    public function store(Request $request){
        $tipoPago  = 'efectivo';
        $orden     = Order::find(\Session::get('order'));
        $productos = collect(ProductsOrders::products($orden->id));
        $venta        = new Sale($orden,$productos);
        $fecha        = Carbon::now()->format('Y-m-d');
        $usuario_id   = Auth::user()->id;
        $subtotal     = $venta->subtotal();
        $descuento    = $venta->descuento();
        $tarjeta      = $orden->pay;
        $estatus      = 'pagado';
        $cliente      = $request->clienteID;
        $total        = ($subtotal - $descuento);
        $total       += $tarjeta;
        $folio        = Sale::generateFolio(Auth::user()->bussine_id);
        if($tarjeta  != 0)
            $tipoPago = "tarjeta";
        $agregar['user_id']    = $usuario_id;
        $agregar['order_id']   = $orden->id;
        $agregar['total']      = $total;
        $agregar['discount']   = $descuento;
        $agregar['pay']        = $tarjeta;
        $agregar['tSale']      = $tipoPago;
        $agregar['status']     = $estatus;
        $agregar['date']       = $fecha;
        $agregar['cliente_id'] = $cliente;
        $agregar['folio']      = $folio;
        try{
            $venta->store($agregar);
            $venta->removeExistence($productos);
        }catch(Exception $e){
            dd($e);
        }
        \Session::remove('order');
        return redirect('/ticket/'.$folio);
    }
    public function ticket($folio){
        $sale     = collect(Sale::ticket($folio))->first();
        $products =  ProductsOrders::products($sale->orden); 
        $subtotal = collect($products)->sum('subtotal');
        $totals   = collect(Sale::totalsShow($sale->id))->first();
        return view('ventas.ticket',compact('sale','products','subtotal','totals'));
    }
    public function show($saleID){
        $sale = collect(Sale::showSale($saleID))->first();
        $products = ProductsOrders::products($sale->orden);
        $subtotal = collect($products)->sum('subtotal');
        $totals   = collect(Sale::totalsShow($sale->id))->first();
        return view('ventas.show',compact('sale','products','subtotal','totals'));
    }
    public function destroy($id){
        //
    }
    public function vender(){
        // CREAR/OBTENER ORDEN
        $order = Order::getOrCreateOrder(\Session::get('order'));
        Order::putOrder($order->id);
        //OBTENER LOS PRODUCTOS DE LA VENTA
        $products = ProductsOrders::products($order->id);
        //OBTENER LOS PRODUCTOS DEL INVETARIO DE LA SUCURSAL
        $productsBusiness = Products::procedureByBusine();
        //clientes de la sucursal
        $clientes = Cliente::all();
        //total de la venta
        $sale     = new Sale($order,collect($products));
        $subtotal = $sale->subtotal();
        $ptarjeta = Bussine::find(Auth::user()->bussine_id)->tarjeta;
        $tarjeta  = $order->pay;
        $pdescuento = $order->discount;
        $descuento = $sale->descuento();
        $total      = ($subtotal - $descuento);
        $total      +=$tarjeta;
        return view('ventas.vender',compact('products','productsBusiness','subtotal','ptarjeta','pdescuento','tarjeta','descuento','total','clientes'));
    }

}
