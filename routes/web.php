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
// Auth::routes(['register' => True]);

Route::get('/', function(){
    return redirect('/tienda');
});
   
// Route::post('registro',[CustomAuthController::class, 'nuevoUsuario']);

Route::get('/login',[CustomAuthController::class,'login'])->name('login');

Route::get('/registro',[CustomAuthController::class,'registro'])->name('user.register.form');

Route::post('/nuevoUsuario',[CustomAuthController::class,'nuevoUsuario'])->name('user.create');

Route::post('/check', [CustomAuthController::class, 'check'])->name('user.check');

Route::get('/tienda', [TiendaController::class,'index'])->name('tiendaHome');

Route::get('/tienda/almacen', [TiendaController::class, 'indexAlmacen'])->name('almacen');

/* PRODUCTOS */

Route::get('/tienda/productos', [TiendaController::class,'indexProductos'])->name('productos');

Route::get('/tienda/productos/nuevo', [TiendaController::class,'nuevoProductoForm'])->name('productos.nuevo');

Route::post('/tienda/productos/registro',[TiendaController::class,'registrarProducto'])->name('productos.registro');

Route::get('/tienda/productos/actualizar/{id}',[TiendaController::class,'updateProductoForm'])->name('producto.update.form');

Route::put('/tienda/producto/update/{id}',[TiendaController::class,'updateProducto'])->name('productos.update');

Route::delete('/tienda/productos/eliminar/{id}',[TiendaController::class,'deleteProducto'])->name('productos.eliminar');

Route::post('/tienda/productos/buscar',[TiendaController::class, 'buscarProducto'])->name('productos.buscar');

Route::get('/tienda/producto/{id}',[TiendaController::class,'verProducto'])->name('productos.ver');


/* VENTAS */

Route::get('/tienda/ventas', [TiendaController::class,'indexVentas'])->name('ventas');

ROute::get('tienda/ventas/nueva',[TiendaController::class, 'nuevaVentaForm'])->name('ventas.nueva');

Route::get('/tienda/venta/{id}',[TiendaController::class,'showVenta'])->name('ventas.ver');

Route::get('/tienda/promocion', [TiendaController::class, 'indexPromocion'])->name('promocion');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
