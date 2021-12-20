<?php

namespace App\Http\Controllers;

// use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{

   public function index_productos(Request $request)
   {
      #se valida si existe un usuario autenticado en la sesion
      if($userid = auth()->id()){
         # se extrae el rol actual del usuario autenticado
         $role = DB::table('users')->select('role')->where('id',$userid)->value;
         # checa si el usuario tiene el rol
         if($this->verifyUserRole($userid,$role)){
            $productos = DB::table('productos')->paginate(10);
            return view('tienda.productos', compact('productos'));
         }
         else{
            return redirect('home');
         }
      }
   }

}
