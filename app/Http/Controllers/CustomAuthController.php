<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function registro(){
        return view('auth.register');
    }

    public function nuevoUsuario(Request $req){
        
        $validated = $req->validate([
            'nombre','apellidoPaterno',
            'aoellidoMaterno','email',
            'rol','password'
        ]);

        if($validated){
            $user = new User();

            $user->nombre = $req->input('nombre');




            $user->save();
        }

    }
}
