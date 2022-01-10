<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Client\Request;

class CustomAuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function registro(){
        return view('auth.register');
    }

    public function nuevoUsuario(Request $req){
        $validated  = $req->validate([
            'nombre', 'apellidoPaterno',
            'apellidoMaterno','email',
            'password','rol'
        ]);
        if($validated != false){
            $user = new User($req->all());
            $res = $user->save();
            if($res){
                return back()->with('success','Registro exitoso');
            }
            else{
                return back()->with('fail','Algo salió mal xP');
            }
        }
    }
}
