<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index_ventas(){
      {
         $ventas = DB::table('ventas')->paginate(10);
         
         return view('tienda.index', compact('ventas'));
      }
    }
}
