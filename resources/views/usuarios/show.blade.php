@extends('layout.layout')

@section('titulo')
CRUD USUARIO MOSTRAR
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Id usuario</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellito Materno</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$usuario->id}}</td>
            <td><img src="{{ asset('storage').'/'.$usuario->Foto}}" alt="" width="200"></td>
            <td>{{$usuario->Nombre}}</td>
            <td>{{$usuario->ApellidoPaterno}}</td>
            <td>{{$usuario->ApellidoMaterno}}</td>
            <td>{{$usuario->Correo}}</td>
        </tr>
    </tbody>
</table>
<a href="{{ url('/usuarios') }}" class="btn btn-primary">Regresar</a>
@endsection
