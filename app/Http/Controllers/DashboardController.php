<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\User;
use App\Category;
use App\Bussine;
use App\Sale;
use App\Provider;
use App\Brand;
use App\Customer;
class DashboardController extends Controller{
    
    public function index(){
    	$count['products']   = Products::where('estatus','activo')->count();
    	$count['users']      = User::where('status','activo')->count();
    	$count['categories'] = Category::count();
    	$count['bussines']   = Bussine::where('estatus','activo')->count();
    	$count['brands']     = Brand::count();
    	$count['providers']  = Provider::count();
        $count['customers']  = Customer::count();
        $count['sales']      = collect(Sale::countSales())->first();
     	$sales               = Sale::ProcedureChartWeekend();
    	return view('index',compact('count','sales'));
    }
}
