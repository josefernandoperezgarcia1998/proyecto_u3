<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
 
class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['usuarios']=User::paginate(5);
        return view('usuarios.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuarios.create');
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

        $datosUsuario=request()->all();
        $datosUsuario=request()->except('_token');
        if($request->hasfile('Foto')){

            $datosUsuario['Foto']=$request->file('Foto')->store('uploads/usuarios','public');
        }
        $datosUsuario['Password']=bcrypt($request->input('Password'));


        User::insert($datosUsuario);
        return redirect('usuarios')->with('Mensaje','Usuario agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
      
        $usuario = User::findOrFail($id);
        return view('usuarios.show',compact('usuario'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuario= User::findOrFail($id);
        return view('usuarios.edit',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         //recoger todos los datos excepto el token de laravel
         $datosUsuario=request()->except(['_token',"_method"]);
         
         if($request->hasfile('Foto')){
            $usuario=User::findOrFail($id);
            Storage::delete('public/'.$usuario->Foto);

            $datosUsuario['Foto']=$request->file('Foto')->store('uploads/usuarios','public');
        }


         User::where('id','=',$id)->update($datosUsuario);

        // $usuario=Usuarios::findOrFail($id);
         //return view('usuarios.edit',compact('usuario'));
         return redirect('usuarios')->with('Mensaje','Usuario modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $usuario=User::findOrFail($id);
        if(Storage::delete('public/'.$usuario->Foto)){
            User::destroy($id);
        }
        return redirect('usuarios')->with('Mensaje','Usuario eliminado con éxito');
    }
}
