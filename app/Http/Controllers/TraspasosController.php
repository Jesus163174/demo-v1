<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traspaso;
class TraspasosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $traspasos = Traspaso::procedureIndex();
        $traspasosListos = Traspaso::procedureAutorizar();
        return view('traspasos.index',compact('traspasos','traspasosListos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function acept(Request $request){
        $transfer = Traspaso::find($request->traspaso_id);
        $transfer->estatus = 'aceptado';
        $transfer->save();
        $msj = "El traspaso fue aceptado correctament";
        return back()->with('status_success',$msj);
    }
    public function autorizar(Request $request){
        $products = Traspaso::products($request->traspaso_id); 
        $transfer = Traspaso::find($request->traspaso_id);
        $doTransfer = Traspaso::doTransfer($products,$transfer);

    }
    public function show($id)
    {
        $traspaso = collect(Traspaso::showTraspaso($id))->first();
        $traspasosListos = Traspaso::procedureAutorizar();
        $productos       = Traspaso::products($id);        
        return view('traspasos.show',['traspaso'=>$traspaso,'traspasosListos'=>$traspasosListos,'productos'=>$productos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
