<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Center;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;

use function Symfony\Component\String\b;

class CustomAuthController extends Controller
{
   public function login()
   {
      return view('auth.login');
   }

   public function registro()
   {
      $centros = Center::all();
      return view('auth.register', compact('centros'));
   }

   public function nuevoUsuario(Request $req)
   {

      $req->validate([
         'nombre' => 'required',
         'apellidoPaterno' => 'required',
         'apellidoMaterno' => 'required',
         'email' => 'required|unique:users',
         'password' => 'required',
         'rol' => 'required|string',
         'centro' => 'string|required|max:25'
      ]);

      $user = new User;
      $user->nombre = $req->nombre;
      $user->active = true;
      $user->apellidoPaterno = $req->apellidoPaterno;
      $user->apellidoMaterno = $req->apellidoMaterno;
      $user->email = $req->email;
      $user->password = Hash::make($req->password);
      // $user->center()->associate($center_id);
      $save = $user->save();

      if ($save) {
         if ($centro = Center::find($req->input('centro'))) {
            DB::table('center_user')->insert([
               'center_id' => $centro->id,
               'user_id'   => $user->id
            ]);
         } else {
            return back()->with('fail', 'hubo un error con el centro');
         }
         return back()->with('success', 'Nuevo usuario registrado');
      } else {
         return back()->with('fail', 'Algo salió mal');
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
         'email' => 'required|email',
         'password' => 'required'
      ]);

      $userInfo = User::where('email', $req->email)->first();

      if (!$userInfo) {
         return back()->with('fail', 'Correo o contraseña incorrectos');
      } else {
         if (Hash::check($req->password, $userInfo->password)) {
            $req->session()->put('LoggedUser', $userInfo->id);
            return redirect()->route('user.session');
         } else {
            return back()->with('fail', 'Correo o contraseña incorrectos');
         }
      }
   }

   function session()
   {
      $data = User::where('id', session('LoggedUser'))->first();
      return view('auth.session', compact('data'));
   }

   public function logout()
   {
      if (session()->has('LoggedUser')) {
         session()->pull('LoggedUser');
         return redirect('/login');
      }
   }
}
