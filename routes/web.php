<?php

use App\Http\Controllers\TiendaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 Cada vista es solicitada por el cliente a travéz de una ruta,
 por lo que cada vista debe ser accesible por el usuario logeado
 a travéz de al menos una ruta.

 Rutas por crear(sugerido, cada quien puede decidir siempre y cuando se extienda del mismo layout):
    tienda/almacen GET : muestra los mas recientes registros de ventas y productos desde la bd
    tienda
 */


//se habilita la ruta de registro de nuevo usuario
Auth::routes(['register' => True]);

Route::get('/', [TiendaController::class,'index'])->name('home')->middleware('auth');

Route::get('/tienda/almacen', [TiendaController::class, 'indexAlmacen'])->name('almacen')->middleware('auth');

Route::get('/tienda/productos', [TiendaController::class,'indexProductos'])->name('productos')->middleware('auth');

Route::get('/tienda/ventas', [TiendaController::class,'indexVentas'])->name('ventas')->middleware('auth');

Route::get('/tienda/promocion', [TiendaController::class, 'indexPromocion'])->name('promocion')->middleware('auth');