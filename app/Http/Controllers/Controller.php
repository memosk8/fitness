<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
    * Comprueba si el dado usuario tiene en 
    * efecto el rol dado
    *
    * @param $userid
    * @return void
    */
    public function verifyUserRole($userid, $role)
    {
      $userRole = DB::table('users')->select('role')->where('id',$userid)->value();
      $module = ($userRole==$role) ? true : false;
      return $module;
    }

}
