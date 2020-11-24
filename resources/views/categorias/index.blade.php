@extends('layout.layout')
@section('titulo')
CRUD CATEGORIA INICIO
@endsection
@section('menu')
          <li class="nav-item">
            <a class="nav-link active" href="categorias">
              <span data-feather="home"></span>
              Categoria <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="usuarios">
              <span data-feather="file"></span>
              Usuario
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="productos">
              <span data-feather="shopping-cart"></span>
              Productos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Cerrar Sesión
            </a>
          </li>
@endsection
@section('contenido')
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<a href="{{ url('categorias/create') }}" class="btn btn-primary">Crear nueva categoria</a>
<br><br>
<table class="table table-striped table-dark">
    <thead class="">
        <tr>
            <th>#</th>
            <th>Imagen</th>
            <th>Nombre de la categoría</th>
            <th>Cantidad</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr> 
    </thead>
    <tbody>
        @foreach($categorias as $categoria)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td><img src="{{ asset('storage').'/'.$categoria->Foto}}" alt="" width="200"></td>
                <td>{{$categoria->Nombre}}</td>
                <td>{{$categoria->Cantidad}}</td>
                <td>{{$categoria->Descripcion}}</td>
                <td>
                <a href="{{ url('/categorias/'.$categoria->id.'/edit') }}" class="btn btn-success">Editar</a> 
                <a href="{{ url('/categorias/'.$categoria->id.'') }}" class="btn btn-warning">Mostrar</a> 
                <form action="{{url('/categorias/'.$categoria->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Deseas Borrar?')" class="btn btn-danger">Borrar</button>
                </form>
                </td> 
            </tr>
        @endforeach
    </tbody>
</table>
@endsection