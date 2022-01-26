<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use App\Models\Promo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class TiendaController extends Controller
{

   public function index()
   {
      return view('tienda.index');
   }

   public function indexAlmacen()
   {
      $almacen = Warehouse::latest()->paginate(15);
      return view('tienda.almacen', compact('almacen', $almacen));
   }

   public function indexProductos()
   {
      $productos = DB::table('products')->where('active',1)->get();

      $data = User::where('id',session('LoggedUser'))->first();

      $count = 1;
      // a cada uno de los productos se le añade
      // la propiedad almacen que refiere al warehouse_id registrado

      foreach ($productos as $producto) {
         if($producto->active != 0){
            $almacenProducto = DB::table('product_warehouse')
               ->select('warehouse_id')
               ->where('product_id', '=', $producto->id)
               ->get();
            $producto->almacen = $almacenProducto[0]->warehouse_id;
         }
      }

      return view('tienda.productos.index', compact('productos','data'));
   }

   public function indexVentas()
   {
      $ventas = Sale::latest()->paginate(5);
      return view('tienda.ventas', compact('ventas', $ventas));
   }

   public function indexPromocion(Request $request){
      $promociones = Promo::all();
      return view('tienda.promociones',compact('promociones'));
   }

   public function nuevoProductoForm()
   {
      $almacenes = DB::table('warehouses')->count();
      return view('tienda.productos.create', compact('almacenes'));
   }

   // se encarga de guardar un nuevo producto en la bd 
   // @req : solicitud post de formulario productos.create
   public function registrarProducto(Request $req)
   {
      // se valida la solicitud de registro de nuevo producto
      $validated_data = $req->validate([
         'nombre' => ['required', 'string', 'max:100'],
         'desc' => ['required', 'string', 'max:255'],
         'precio' => 'numeric',
         'costo' => 'numeric',
         'almacen' => 'numeric',
         'stock' => 'numeric'
      ]);

      // se crea un nuevo producto con la solicitud validada
      $producto = new Product($validated_data);
      $producto->active = True;
      $producto->save();

      // actualizo la tabla de relaciones almacen-producto
      // para lo que ambas entidades ya deben existir en la bd
      DB::table('product_warehouse')->insert([
         'stock' => $req->input('stock'),
         'product_id' => $producto->id,
         'warehouse_id' => $req->input('almacen'),
         'created_at' => Date::now()->toDateTimeLocalString()
      ]);

      return redirect('/tienda/productos');
   }

   public function verProducto($id)
   {
      $producto = Product::find($id);
      return view('tienda.productos.show', compact('producto', $producto));
   }

   public function updateProductoForm(Request $req, $id)
   {
      // encontramos el producto con el id 
      $producto = Product::find($id);

      // actualizamos ese producto con las variables del formulario update 
      $producto->update($req->all());

      $almacenProducto = DB::table('product_warehouse')
         ->select('warehouse_id', 'stock')
         ->where('product_id', '=', $producto->id)
         ->get();
      $producto->almacen = $almacenProducto[0]->warehouse_id;
      $producto->stock = $almacenProducto[0]->stock;

      // respondemos con el mismo formulario, pero ahora los valores van a ser leidos desde el servidor
      return view('tienda.productos.update', compact('producto', $producto));
   }

   public function updateProducto(Request $req, $id)
   {
      // selecciona products en la db 
      DB::table('products')
         // donde está este id
         ->where('id',$id)
         // y actualiza COLUMNA => VALOR
         ->update([
            'nombre' => $req->input('nombre'),
            'desc'   => $req->input('desc'),
            'precio' => $req->input('precio'),
            'costo'  => $req->input('costo'),
            'updated_at' => Date::now()->toDateTimeString()
         ]);

      DB::table('product_warehouse')
         ->where('product_id',$id)
         ->update([
            'stock'        => $req->input('stock'),
            'product_id'   => $id,
            'warehouse_id' => $req->input('almacen')
         ]);

      return redirect()->route('productos');
   }

   public function buscarProducto(Request $req)
   {
      // $busqueda = $req->input('search');

      // return view('tienda.productos.show', compact('busqueda'));
   }

   public function deleteProducto($id)
   {
      DB::table('product_warehouse')->where('product_id',$id)->delete();
      
      DB::table('products')->where('id',$id)->update([
         'active'     => 0,
         'deleted_at' => Date::now()->toDateTimeString(),
      ]);
      return redirect()->route('productos');
   }

   //By Marisol Benitez
   public function newPromo(Request $request){
      $promo = new Promo();
      $promo->center_name = $request->input('center_name');
      $promo->product_name = $request->input('product_name');
      $promo->price = $request->input('price');
      $promo->month = $request->input('month');
      $promo->status=True;
      $promo->save();
      
      return redirect('tienda/promocion');
  }

  public function viewPromo(){
      $promo = Promo::select('center_name')->get();
      return redirect('tienda/promocion');
  }

  public function PromoForm()
  {
   $centers = DB::table('centers')->select('nombre')->get();
   $products = DB::table('products')->select('nombre')->get();

   return view('tienda.promociones.registrar',compact('centers','products'));
  }

  public function editPromo($id){
   $promociones = Promo::find($id);
   $centers = DB::table('centers')->select('nombre')->get();
   $products = DB::table('products')->select('nombre')->get();
   return view('tienda.promociones.editar',compact('promociones','centers','products'));
  }

  public function updatePromo(Request $request, $id){
  
  DB::table('promos')
  
  ->where('id',$id)
  
  ->update([
     
     'center_name'   => $request->input('center_name'),
     'product_name' => $request->input('product_name'),
     'price'  => $request->input('price'),
     'month'  => $request->input('month'),
     'updated_at' => Date::now()->toDateTimeString()
  ]);

  
   return redirect('tienda/promocion');
  }
  
  public function destroyPromo($id){
   $promocion = Promo::find($id);
   $promocion->delete();
   return redirect('tienda/promocion');
      
  }
}
