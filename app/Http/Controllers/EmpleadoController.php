<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Orden;
use App\Models\Vivienda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  echo "hola david";
       // Empleado::insert(
         //   ['nombre'=>'davida','apellido'=>'pereza','correo'=>'coreaaao@hotmail.com']
        //);
        $datos['empleados'] = Empleado::paginate(2);
        return view('empleado.index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $campos = [
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'correo' => 'required|email',
            'foto' => 'required|max:10000|mimes:jpeg,png,jpg',
        ];

        $mensajes = [
            'required' => 'El :attribute es requerido',
            'foto.required' => 'La foto es requerida'
        ];

        $this->validate($request,$campos,$mensajes);

        $datosEmpleado = request()->except('_token');

        if($request->hasFile('foto')){
            //guardar imagen en tipo BLOB
            $file = $request->file('foto');
            $contents = $file->openFile()->fread($file->getSize());
            $datosEmpleado['foto'] = $contents;


            // $datosEmpleado['foto'] = $request->file('foto')->store('upload','public');
        }

        Empleado::insert($datosEmpleado);

       return redirect('empleado')->with('mensaje','Empleado Agregado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos = [
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'correo' => 'required|email',
            
        ];

        $mensajes = [
            'required' => 'El :attribute es requerido',
        ];


        if($request->hasFile('foto')){
            $campos = ['foto' => 'required|max:10000|mimes:jpeg,png,jpg'];
            $mensajes = ['foto.required' => 'La foto es requerida'];
        }

        $this->validate($request,$campos,$mensajes);

        $datosEmpleado = request()->except(['_token','_method']);
        
        //si cambia la foto
        if($request->hasFile('foto')){

            $file = $request->file('foto');
            $contents = $file->openFile()->fread($file->getSize());
            $datosEmpleado['foto'] = $contents;
            /*
            $empleado = Empleado::findOrFail($id);
            Storage::delete('public/'.$empleado->foto);
            $datosEmpleado['foto'] = $request->file('foto')->store('upload','public');*/
        }
        
        Empleado::where('id','=',$id)->update($datosEmpleado);
        //$empleado = Empleado::findOrFail($id);
        return redirect('empleado')->with('mensaje','Empleado Modificado');

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $empleado = Empleado::findOrFail($id);
        if(Storage::delete('public/'.$empleado->foto)){
            Orden::where('customer_id','=',$id)->delete();
            Vivienda::where('empleado_id','=',$id)->delete();
            Empleado::destroy($id);
        }

       
        return redirect('empleado')->with('mensaje','Se ha Eliminado al Cliente');
    }
}
