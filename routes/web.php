<?php

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

Route::get('/', function () {
   return view('welcome');
});

Auth::routes(['register' => True]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// TENER EN CUENTA EL ORDEN DE LAS RUTAS, YA QUE LARAVEL AL SER PHP COMIENZA A LEER EL ARCHIVO DE INICIO A FIN 
// ENTONCES LAS RUTAS MAS ESPECIFICAS EJ: /TIENDA/PRODUCTOS/{id} DEBEN ESTAR ORDENADAS AL PRINCIPIO DEL ARCHIVO
// Y LAS MENOS ESPECIFICAS EJ: /TIENDA DEBEN ESTAR AL FINAL, DE CIERTA FORMA DESCENDIENTE

// la ruta del controlador debe ser completa y exactamente igual ¬¬
// todas las rutas deben estar autenticadas
Route::get('/tienda/productos', [App\Http\Controllers\ProductosController::class, 'index_productos'])
   ->middleware('auth')->name('productos');
//  mostrar la pagina de inicio de la tienda, como defecto redirige a la vista de ventas
Route::get('/tienda', function () {
   return redirect('/tienda/ventas');
})->middleware('auth');

Route::get('/tienda/ventas', [App\Http\Controllers\VentasController::class, 'index_ventas'])->middleware('auth')->name('ventas');


/* Route::get('/tienda', function() {
   return view('tienda.index');
})->name("Tienda Fitness")->middleware('auth'); */