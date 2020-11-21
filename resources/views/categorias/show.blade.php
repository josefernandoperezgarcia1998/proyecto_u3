@extends('layout.layout')

@section('titulo')
CRUD CATEGORIA MOSTRAR
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
            <th>Categoria id</th>
            <th>Imagen</th>
            <th>Nombre de la categoría</th>
            <th>Cantidad</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$categoria->id}}</td>
            <td><img src="{{ asset('storage').'/'.$categoria->Foto}}" alt="" width="200"></td>
            <td>{{$categoria->Nombre}}</td>
            <td>{{$categoria->Cantidad}}</td>
            <td>{{$categoria->Descripcion}}</td>
        </tr>
    </tbody>
</table>
<a href="{{ url('/categorias') }}" class="btn btn-primary">Regresar</a>
@endsection
