<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoFormRequest;
use App\Http\Requests\UserPostRequest;
use App\Models\Warehouse;
use App\Models\Image;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TiendaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $productos = Product::all();
        $images = Image::all();
        $stock = Product::count();
        return view('tienda.productos.index', compact('productos', 'images', 'stock'));
    }

    public function indexVentas()
    {
        $ventas = Sale::latest()->paginate(5);
        return view('tienda.ventas', compact('ventas', $ventas));
    }

    public function nuevoProductoForm()
    {
        return view('tienda.productos.create');
    }

    // se encarga de guardar un nuevo producto en la bd 
    public function registrarProducto(ProductoFormRequest $req)
    {
        // se valida la solicitud de registro de nuevo producto
        // usando $req que es una instancia de ProductoFormRequest
        $validated_data = $req->validated();
        $producto = new Product($req->all());
        $producto->active = True;
        $producto->save();

        return redirect('/tienda/productos');
    }

    public function verProducto($id){
        $producto = Product::find($id);
        return view('tienda.productos.show',compact('producto',$producto));
    }

    public function updateProductoForm(Request $req, $id){

        // validamos la nueva solicitud post para productos
        // $validated_prod = $req->validated();

        // encontramos el producto con el id 
        $producto = Product::find($id);

        // actualizamos ese producto con las variables del formulario update 
        $producto->update($req->all());

        // respondemos con el mismo formulario, pero ahora los valores van a ser leidos desde el servidor
        return view('tienda.productos.update', compact('producto',$producto));
    }

    public function updateProducto(ProductoFormRequest $req, Product $producto)
    {
        $validado = $req->validated();

        $updated = $producto->update($validado);

        if($updated) return redirect()->back()->with('success', 'Producto actualizado');

        else return redirect()->back()->with('fail', 'No se pudo actualizar el producto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTiendaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTiendaRequest $request)
    {
        //
    }

    public function deleteProducto(Product $producto)
    {
        
    }
}
