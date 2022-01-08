<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use App\Http\Requests;
use App\Models\Image;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;


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

    public function indexAlmacen(){
        $almacen = Warehouse::latest()->paginate(15);
        return view('tienda.almacen',compact('almacen',$almacen));
    }

    public function indexProductos(){
        $productos = Product::all();
        $images = Image::all();
        $stock = Product::count();
        return view('tienda.productos.index', compact('productos','images','stock'));
    }

    public function indexVentas(){
        $ventas = Sale::latest()->paginate(5);
        return view('tienda.ventas',compact('ventas',$ventas));
    }

    public function nuevoProductoForm(){
        return view('tienda.productos.create');
    }

    // se encarga de guardar un nuevo producto en la bd 
    public function registrarProducto(Request $req){


        $producto = new Product();
        $producto->nombre = $req->input('nombre');
        $producto->desc = $req->input('desc');
        $producto->precio = $req->input('precio');
        $producto->costo = $req->input('costo');
        $producto->active = True;
        $producto->save();

        return redirect('/tienda/productos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function show(Tienda $tienda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function edit(Tienda $tienda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTiendaRequest  $request
     * @param  \App\Models\Tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTiendaRequest $request, Tienda $tienda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tienda $tienda)
    {
        //
    }
}
