<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;


class CustomAuthController extends Controller
{
   public function login()
   {
      return view('auth.login');
   }

   public function registro()
   {
      return view('auth.register');
   }

   public function nuevoUsuario(Request $req)
   {

      $req->validate([
         'nombre' => 'required',
         'apellidoPaterno' => 'required',
         'apellidoMaterno' => 'required',
         'email' => 'required|unique:users',
         'password' => 'required',
         'rol' => 'required|string'
      ]);

      $user = new User;
      $user->nombre = $req->nombre;
      $user->active = true;
      $user->apellidoPaterno = $req->apellidoPaterno;
      $user->apellidoMaterno = $req->apellidoMaterno;
      $user->email = $req->email;
      $user->password = Hash::make( $req->password);

      $save = $user->save();

      if ($save) {
         return back()->with('success', 'Nuevo usuario registrado');
      } else {
         return back()->with('fail', 'Something went wrong');
      }

      // return $validated;

      // DB::table('users')->insert([
      //    'nombre' => $req->input('nombre'),
      //    'active' => true,
      //    'apellidoPaterno' => $req->input('apellidoPaterno'),
      //    'apellidoMaterno' => $req->input('apellidoMaterno'),
      //    'email' => $req->input('email'),
      //    'password' => Hash('md5', $req->input('password')),
      //    'rol' => $req->input('rol'),
      //    'created_at' => Date::now()->toDateTimeLocalString()
      // ]);

   }

   function check(Request $req)
   {
      $req->validate([
         'email' => 'required',
         'password' => 'required'
      ]);

      $userInfo = User::where('email', $req->email)->first();

      if (!$userInfo) {
         return back()->with('fail', 'No reconocemos ese correo');
      } else {
         if (Hash::check($req->password, $userInfo->password)){
            $req->session()->put('LoggedUser', $userInfo->id);
            return redirect()->route('productos');
         }
         else{
            return back()->with('fail','Password incorrecto');
         }
      }
   }

   function logeado(){
      $data = ['LoggedUserInfo' => User::where('id',session('LoggedUser'))->first()];
      return view('tienda.productos.index', $data);
   }
}
