<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['categorias']=Categorias::paginate(5);
        return view('categorias.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categorias.create');
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

        $datosCategoria=request()->all();
        $datosCategoria=request()->except('_token');
        if($request->hasfile('Foto')){

            $datosCategoria['Foto']=$request->file('Foto')->store('uploads/categorias','public');
        }

        Categorias::insert($datosCategoria);
        return redirect('categorias')->with('Mensaje','Categoria agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $categoria = Categorias::findOrFail($id);
        return view('categorias.show',compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categoria=Categorias::findOrFail($id);
        return view('categorias.edit',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
 
                $datosCategoria=request()->except(['_token',"_method"]);
         
                if($request->hasfile('Foto')){
                   $categoria=Categorias::findOrFail($id);
                   Storage::delete('public/'.$categoria->Foto);
       
                   $datosCategoria['Foto']=$request->file('Foto')->store('uploads/categorias','public');
               }
       
       
                Categorias::where('id','=',$id)->update($datosCategoria);
 
                return redirect('categorias')->with('Mensaje','Categoria modificada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $categoria=Categorias::findOrFail($id);
        if(Storage::delete('public/'.$categoria->Foto)){
            Categorias::destroy($id);
        }
        return redirect('categorias')->with('Mensaje','Categoria eliminado con éxito');
    }
}
