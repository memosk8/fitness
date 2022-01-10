<?php

use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiendaController;

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

//se habilita la ruta de registro de nuevo usuario
Auth::routes(['register' => True]);

Route::get('/', function(){
    return redirect('/tienda');
});

Route::get('/login',[CustomAuthController::class,'login'])->name('login');

Route::get('/registro',[CustomAuthController::class,'registro'])->name('registro');
Route::post('/registroUsuario',[CustomAuthController::class,'nuevoUsuario'])->name('registro.usuario');

Route::get('/tienda', [TiendaController::class,'index'])->name('tiendaHome');

Route::get('/tienda/almacen', [TiendaController::class, 'indexAlmacen'])->name('almacen');

Route::get('/tienda/productos', [TiendaController::class,'indexProductos'])->name('productos');

Route::get('/tienda/productos/nuevo', [TiendaController::class,'nuevoProductoForm'])->name('productos.nuevo');

Route::post('/tienda/productos/registro',[TiendaController::class,'registrarProducto'])->name('productos.registro');

Route::get('/tienda/producto/{id}',[TiendaController::class,'showProducto'])->name('productos.ver');

Route::get('/tienda/ventas', [TiendaController::class,'indexVentas'])->name('ventas');

Route::get('/tienda/venta/{id}',[TiendaController::class,'showVenta'])->name('showVenta');

Route::get('/tienda/promocion', [TiendaController::class, 'indexPromocion'])->name('promocion');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
