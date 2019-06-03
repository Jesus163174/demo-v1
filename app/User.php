<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','celular','bussine_id','rol','comision'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function procedureIndex(){
        return DB::select('call get_usuarios_index');
    }
    public static function store($request){
        return User::create($request);
    }
    public static function updat($request,$id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->celular = $request->celular;
        $user->comision = $request->comision;
        $user->rol = $request->rol;
        $user->bussine_id = $request->bussine_id;
        $user->updated_at = now();
        return $user->save();
    }
}
