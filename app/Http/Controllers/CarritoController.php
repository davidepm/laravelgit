<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Empleado;
use App\Models\Producto;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$datos['carritos'] = Carrito::paginate(10);
        $productos = Producto::all();
        return view('carrito.index',$datos,compact('productos'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = Empleado::all();
        $productos = Producto::all();
        return view('carrito.create',compact('empleados','productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $datosCarrito = request();
        $producto = Producto::where('id','=',$datosCarrito['seleccion'])->get();

        $precio = $producto[0]['precio'];
        Carrito::create([
            'estado'=> 'a',
            'cantidad' => $datosCarrito['cantidad'],
            'total'=>$datosCarrito['cantidad'] * $precio,
            'producto_id' => $datosCarrito['seleccion']
        ]);

        return redirect('carrito')->with('mensaje','El producto se ha agregado al carrito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function show(Carrito $carrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrito $carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrito $carrito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrito = Carrito::findOrFail($id);
        Carrito::destroy($id);


        return redirect('carrito')->with('mensaje','Se ha Eliminado el Producto del carrito');
    }
}
