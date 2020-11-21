<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
/*         $productos = Productos::all();
        return  view('productos.index',compact('productos')); */
        $datos['productos']=Productos::paginate(5);
        return view('productos.index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
 /*        $productos = Productos::all();
        $categorias = Categorias::all();
        return  view('productos.create',compact('productos','categorias')); */
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
/*         $productos = new Productos();

        $productos->Nombre = $request->input('Nombre');
        $productos->Cantidad = $request->input('Cantidad');
        $productos->categorias_id = $request->input('categorias');
        
        if($request->hasfile('Foto')){
            $datosProducto['Foto']=$request->file('Foto')->store('uploads/productos','public');
        }
        $productos = $datosProducto;
        $productos->save(); */


        $datosProducto=request()->all();
        $datosProducto=request()->except('_token');
        if($request->hasfile('Foto')){

            $datosProducto['Foto']=$request->file('Foto')->store('uploads/productos','public');
        }

        Productos::insert($datosProducto);
        return redirect('productos')->with('Mensaje','Producto agregado con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
 /*        $productos=Productos::findorFail($id);
        return view('productos.show',compact('productos')); */
        $producto = Productos::findOrFail($id);
        return view('productos.show',compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
/*         $categorias = Categorias::all();
        $productos = Productos::findorFail();
        return  view('productos.index',compact('productos','categorias')); */
        $producto=Productos::findOrFail($id);
        return view('productos.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
/*         $rules = [
            'id' => 'required',
            'Nombre' => 'required',
            'Cantidad' => 'required',
            'categorias' => 'required',
            'Foto' => 'required',
            ];
                                   
            $messages = [
            'id.required' => 'Es necesario ingresar un nombre.',
            'Nombre.required' => 'Es necesario ingresar un nombre.',
            'Cantidad.required' => 'Es necesario ingresar cantidad.',
            'categorias.required' => 'Es necesario ingresar una categoria.',
            'Foto.required' => 'Es necesario ingresar una imagen.',
            ];
                     
            // $this->validate($request, $rules, $messages);
        
            $productos = Productos::findOrFail($id);
            $productos->Nombre = $request->input('nombre');
            $productos->Cantidad = $request->input('cantidad');
            $productos->categorias_id = $request->input('categorias');
            
            if($request->hasfile('Foto')){
                $datosProducto['Foto']=$request->file('Foto')->store('uploads/productos','public');
            }
            $productos = $datosProducto;

            $productos->save();

            $notificacion= 'El producto se ha actualizado correctamente.';
            return redirect('/Productos')->with(compact('notificacion')); */

            $datosProducto=request()->except(['_token',"_method"]);
         
            if($request->hasfile('Foto')){
               $producto=Productos::findOrFail($id);
               Storage::delete('public/'.$producto->Foto);
   
               $datosProducto['Foto']=$request->file('Foto')->store('uploads/productos','public');
           }
            Productos::where('id','=',$id)->update($datosProducto);
            return redirect('productos')->with('Mensaje','Categoria modificada con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
/*         $productos = Productos::find($id);
        $notificacion = 'El producto "'. $productos->Nombre .'" se ha eliminado correctamente.';
        $productos->delete();
        return redirect('/Productos')->with(compact('notificacion')); */
        $producto=Productos::findOrFail($id);
        if(Storage::delete('public/'.$producto->Foto)){
            Productos::destroy($id);
        }
        return redirect('productos')->with('Mensaje','Producto eliminado con éxito');
    }
}
