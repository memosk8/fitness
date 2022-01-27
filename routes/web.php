<?php

use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiendaController;

Route::get('/', function () {
   return redirect('/login');
});

Route::get('/login', [CustomAuthController::class, 'login'])->name('login');


Route::group(['middleware' => ['AuthCheck']], function () {
   /** Validación de rutas, redirige al login si se intenta acceder a estas rutas sin estar logeado */
   
   Route::get('/tienda/user', [CustomAuthController::class, 'session'])->name('user.session');
   Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');
   Route::get('/registro', [CustomAuthController::class, 'registro'])->name('user.register.form');
   Route::post('/nuevoUsuario', [CustomAuthController::class, 'nuevoUsuario'])->name('user.create');
   Route::post('/check', [CustomAuthController::class, 'check'])->name('user.check');
   Route::get('/tienda/almacen', [TiendaController::class, 'indexAlmacen'])->name('almacen');

   /* PRODUCTOS */
   Route::get('/tienda/productos', [TiendaController::class, 'indexProductos'])->name('productos');
   Route::get('/tienda/productos/nuevo', [TiendaController::class, 'nuevoProductoForm'])->name('productos.nuevo');
   Route::post('/tienda/productos/registro', [TiendaController::class, 'registrarProducto'])->name('productos.registro');
   Route::get('/tienda/productos/actualizar/{id}', [TiendaController::class, 'updateProductoForm'])->name('producto.update.form');
   Route::put('/tienda/producto/update/{id}', [TiendaController::class, 'updateProducto'])->name('productos.update');
   Route::delete('/tienda/productos/eliminar/{id}', [TiendaController::class, 'deleteProducto'])->name('productos.eliminar');
   Route::post('/tienda/productos/buscar', [TiendaController::class, 'buscarProducto'])->name('productos.buscar');
   Route::get('/tienda/producto/{id}', [TiendaController::class, 'verProducto'])->name('productos.ver');

   //clientes *******************************************************************************************************
   Route::get('/tienda/clientes', [TiendaController::class, 'indexClientes'])->name('clientes');
   Route::get('/tienda/clientes/nuevo', [TiendaController::class, 'nuevoClienteForm'])->name('clientes.nuevo');
   Route::post('/tienda/clientes/registro', [TiendaController::class, 'registrarCliente'])->name('clientes.registro');
   Route::get('/tienda/clientes/actualizar/{id}', [TiendaController::class, 'updateClienteForm'])->name('cliente.update.form');
   Route::put('/tienda/cliente/update/{id}', [TiendaController::class, 'updateCliente'])->name('clientes.update');
   Route::delete('/tienda/clientes/eliminar/{id}', [TiendaController::class, 'deleteCliente'])->name('clientes.eliminar');
   Route::post('/tienda/clientes/buscar', [TiendaController::class, 'buscarCliente'])->name('clientes.buscar');
   Route::get('/tienda/cliente/{id}', [TiendaController::class, 'verCliente'])->name('clientes.ver');

   /* VENTAS */

   Route::get('/tienda/ventas', [TiendaController::class, 'indexVentas'])->name('ventas');
   Route::get('tienda/ventas/nueva', [TiendaController::class, 'nuevaVentaForm'])->name('ventas.nueva');
   Route::get('/tienda/ventas/registrar', [TiendaController::class, 'registrarIndex'])->name('registrarIndex');
   Route::get('/tienda/ventas/create', [TiendaController::class, 'registrarVenta'])->name('registrarVenta');
   Route::get('/tienda/ventas/modificar', [TiendaController::class, 'updateIndex'])->name('updateIndex');
   Route::get('tienda/ventas/nueva', [TiendaController::class, 'nuevaVentaForm'])->name('ventas.nueva');
   Route::get('/tienda/venta/{id}', [TiendaController::class, 'showVenta'])->name('ventas.ver');
   Route::get('/tienda/promocion', [TiendaController::class, 'indexPromocion'])->name('promocion');

   /* PROMOCIONES */

   Route::get('/tienda/promocion', [TiendaController::class, 'indexPromocion'])->name('promociones.index');
   Route::get('/tienda/promociones/registrar', [TiendaController::class, 'PromoForm'])->name('promociones.reg');
   Route::get('/tienda/promocion/create', [TiendaController::class, 'newPromo'])->name('promociones.create');
   Route::get('/tienda/promocion/destroy/{id}', [TiendaController::class, 'destroyPromo'])->name('promociones.destroy');
   Route::get('/tienda/promociones/editar/{id}', [TiendaController::class, 'editPromo'])->name('promociones.edit');
   Route::get('/tienda/promociones/guardar/{id}', [TiendaController::class, 'updatePromo'])->name('promociones.update');
});
