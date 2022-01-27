<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use App\Models\Promo;
use App\Models\Client;
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

   /** PRODUCTOS - MEMO */

   public function indexProductos()
   {
      $productos = DB::table('products')->where('active', 1)->get();

      $data = User::where('id', session('LoggedUser'))->first();

      // a cada uno de los productos se le añade
      // la propiedad almacen que refiere al warehouse_id registrado

      foreach ($productos as $producto) {
         if ($producto->active != 0) {
            $almacenProducto = DB::table('product_warehouse')
               ->select('warehouse_id')
               ->where('product_id', '=', $producto->id)
               ->get();
            $producto->almacen = $almacenProducto[0]->warehouse_id;
         }
      }

      return view('tienda.productos.index', compact('productos', 'data'));
   }

   public function indexVentas()
   {
      $ventas = Sale::latest()->paginate(5);
       return view('tienda.ventas.index', compact('ventas', $ventas));
   }

   public function indexPromocion(Request $request)
   {
      $promociones = Promo::all();
      return view('tienda.promociones', compact('promociones'));
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
         ->where('id', $id)
         // y actualiza COLUMNA => VALOR
         ->update([
            'nombre' => $req->input('nombre'),
            'desc'   => $req->input('desc'),
            'precio' => $req->input('precio'),
            'costo'  => $req->input('costo'),
            'updated_at' => Date::now()->toDateTimeString()
         ]);

      DB::table('product_warehouse')
         ->where('product_id', $id)
         ->update([
            'stock'        => $req->input('stock'),
            'product_id'   => $id,
            'warehouse_id' => $req->input('almacen')
         ]);

      return redirect()->route('productos');
   }

   public function buscarProducto(Request $req)
   {
      $producto = new Product;
      $busqueda = $req->input('search');

      $productos = DB::table('products')
         ->where('nombre', 'LIKE', '%' . $busqueda . '%')
         ->orWhere('id', $busqueda)
         ->get();

      foreach ($productos as $producto) {
         if ($producto->active != 0) {
            $almacenProducto = DB::table('product_warehouse')
               ->select('warehouse_id')
               ->where('product_id', '=', $producto->id)
               ->get();
            $producto->almacen = $almacenProducto[0]->warehouse_id;
         }
      }

      return view('tienda.productos.show', compact('productos'));
   }

   public function deleteProducto($id)
   {
      DB::table('product_warehouse')->where('product_id', $id)->delete();

      DB::table('products')->where('id', $id)->update([
         'active'     => 0,
         'deleted_at' => Date::now()->toDateTimeString(),
      ]);
      return redirect()->route('productos');
   }

   /** PROMOCIONES - MARISOL */

   //By Marisol Benitez
   public function newPromo(Request $request)
   {
      $promo = new Promo();
      $promo->center_name = $request->input('center_name');
      $promo->product_name = $request->input('product_name');
      $promo->price = $request->input('price');
      $promo->month = $request->input('month');
      $promo->status = True;
      $promo->save();

      return redirect('tienda/promocion');
   }

   public function viewPromo()
   {
      $promo = Promo::select('center_name')->get();
      return redirect('tienda/promocion');
   }

   public function PromoForm()
   {
      $centers = DB::table('centers')->select('nombre')->get();
      $products = DB::table('products')->select('nombre')->get();

      return view('tienda.promociones.registrar', compact('centers', 'products'));
   }

   public function editPromo($id)
   {
      $promociones = Promo::find($id);
      $centers = DB::table('centers')->select('nombre')->get();
      $products = DB::table('products')->select('nombre')->get();
      return view('tienda.promociones.editar', compact('promociones', 'centers', 'products'));
   }

   public function updatePromo(Request $request, $id)
   {

      DB::table('promos')

         ->where('id', $id)

         ->update([

            'center_name'   => $request->input('center_name'),
            'product_name' => $request->input('product_name'),
            'price'  => $request->input('price'),
            'month'  => $request->input('month'),
            'updated_at' => Date::now()->toDateTimeString()
         ]);


      return redirect('tienda/promocion');
   }

   public function destroyPromo($id)
   {
      $promocion = Promo::find($id);
      $promocion->delete();
      return redirect('tienda/promocion');
   }

   //clientes**********************************************************************


   public function indexCliente()
   {
      $cliente = Client::latest()->paginate(15);
      return view('tienda.cliente', compact('cliente', $cliente));
   }

   public function indexClientes()
   {
      $clientes = DB::table('clients')->where('active', 1)->get();

      $count = 1;
      // a cada uno de los productos se le añade
      // la propiedad almacen que refiere al warehouse_id registrado
      // no seas pendejo cabrón
      // foreach ($clientes as $cliente) {
      //     if($cliente->active != 0){
      //       $clienteVentas = DB::table('client_sale')
      //          ->select('sale_id')
      //          ->where('client_id', '=', $cliente->id)
      //          ->get();
      //       // $cliente->ventas = $clienteVentas;
      //    } 
      // }

      return view('tienda.clientes.index', compact('clientes', 'count'));
   }

   public function indexVentasCliente()
   {
      $ventas = Sale::latest()->paginate(5);
      return view('tienda.ventas', compact('ventas', $ventas));
   }

   public function nuevoClienteForm()
   {
      $ventas = DB::table('sales')->count();
      return view('tienda.clientes.create', compact('ventas'));
   }

   // se encarga de guardar un nuevo producto en la bd 
   // @req : solicitud post de formulario productos.create
   public function registrarCliente(Request $req)
   {
      // se valida la solicitud de registro de nuevo cliente
      $validated_data = $req->validate([
         'nombre' => ['required', 'string', 'max:100'],
         'cuota' => 'numeric',
         'apellidoPaterno' => 'string',
         'apellidoMaterno' => 'string',
         'calle' => 'string',
         'numInt' => 'numeric',
         'numExt' => 'numeric',
         'ciudad' => 'string',
         'estado' => 'string',
         'cp' => 'numeric'

      ]);

      // se crea un nuevo cliente con la solicitud validada
      $cliente = new Client($validated_data);
      $cliente->active = True;
      $cliente->save();

      // actualizo la tabla de relaciones ventas-cliente
      // para lo que ambas entidades ya deben existir en la bd
      // DB::table('client_sale')->insert([
      //    'id' => $req->input('id'),
      //    'client_id' => $cliente->id,
      //    'sale_id' => $req->input('ventas'),
      //    'created_at' => Date::now()->toDateTimeLocalString()
      // ]);

      return redirect('/tienda/clientes');
   }

   public function verCliente($id)
   {
      $cliente = Client::find($id);
      return view('tienda.clientes.show', compact('cliente', $cliente));
   }

   public function updateClienteForm(Request $req, $id)
   {
      // encontramos el cliente con el id 
      $cliente = Client::find($id);

      // actualizamos ese cliente con las variables del formulario update 
      $cliente->update($req->all());

      $ventasCliente = DB::table('client_sale')
         ->select('sales_id', 'sales')
         ->where('client_id', '=', $cliente->id)
         ->get();
      $cliente->ventas = $ventasCliente[0]->sales_id;
      $cliente->ventas = $ventasCliente[0]->sales;

      // respondemos con el mismo formulario, pero ahora los valores van a ser leidos desde el servidor
      return view('tienda.clientes.update', compact('cliente', $cliente));
   }

   public function updateCliente(Request $req, $id)
   {
      // selecciona clients en la db 
      DB::table('clients')
         // donde está este id
         ->where('id', $id)
         // y actualiza COLUMNA => VALOR
         ->update([
            'nombre' => $req->input('nombre'),
            'cuota'   => $req->input('cuota'),
            'apellidoPaterno' => $req->input('apellidoPaterno'),
            'apellidoMaterno'  => $req->input('apellidoMaterno'),
            'calle'   => $req->input('calle'),
            'numIxt'   => $req->input('numInt'),
            'numExt'   => $req->input('numExt'),
            'ciudad'   => $req->input('ciudad'),
            'estado'   => $req->input('estado'),
            'cp'   => $req->input('cp'),
            'updated_at' => Date::now()->toDateTimeString()
         ]);

      DB::table('client_sale')
         ->where('client_id', $id)
         ->update([
            'sales'        => $req->input('sales'),
            'client_id'   => $id,
            'sales_id' => $req->input('ventas')
         ]);

      return redirect()->route('clientes');
   }

   public function buscarCliente(Request $req)
   {
      // $busqueda = $req->input('search');

      // return view('tienda.productos.show', compact('busqueda'));
   }

   public function deleteCliente($id)
   {
      DB::table('client_sale')->where('client_id', $id)->delete();

      DB::table('clients')->update([
         'active'     => 0,
         'deleted_at' => Date::now()->toDateTimeString(),
      ]);
      return redirect()->route('clientes');
   }
   //Ventas
   
  
   public function registrarVenta(Request $req )
   {
       $venta = new Sale();
       $venta->fecha = $req->input('fecha');
       $venta->nombreproducto = $req->input('nombreproducto');
       $venta->nombrecliente = $req->input('nombrecliente');
       $venta->nombreusuario = $req->input('nombreusuario');
       $venta->cantidad = $req->input('cantidad');
       $venta->save();
       return redirect('/tienda/ventas');
   }
   // La funcion registrar Ventas fue hecha por Mauricio Castañeda 
   public function registrarIndex(){
       $ventas = new Sale();
       $productos= new Product();
        $ventas = Sale::latest()->paginate(5);
        return view('tienda.ventas.registrar',compact('ventas',$ventas));
    }
    public function updateIndex(){
       return view ('tienda.ventas.update');
    }
   
}
