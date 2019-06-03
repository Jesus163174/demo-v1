<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bussine;
use App\User;
class UsersController extends Controller{

    public function index()
    {
        $users = User::procedureIndex();
        return view('usuarios.index',['users'=>$users]);
    }
    public function create()
    {
        $bussines = Bussine::all();
        return view('usuarios.create',['bussines'=>$bussines]);
    }
    public function store(Request $request)
    {
        try{
            $request['password'] = bcrypt($request->password);
            $response = User::store($request->all());
            $msj = "El empleado fue agregado correctamente";
            return redirect('usuarios')->with('status_success',$msj);
        }catch(Exception $e){

        }
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $user = User::find($id);
        $bussine = Bussine::find($user->bussine_id);
        $bussines = Bussine::all();
        return view('usuarios.edit',compact('user','bussine','bussines'));
    }
    public function update(Request $request, $id)
    {
        try{
            $response = User::updat($request,$id);
            $msj = "El usuario fue actualizado correctamente";
            return redirect('/usuarios')->with("status_success",$msj);
        }catch(Exception $e){

        }
    }
    public function destroy($id)
    {
        //
    }
}
