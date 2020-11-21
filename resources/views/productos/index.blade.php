@extends('layout.layout')

@section('titulo')
CRUD PRODUCTOS INICIO
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
<a href="{{ url('productos/create') }}" class="btn btn-primary">Crear nuevo producto</a>
<br><br>
<table class="table table-striped table-dark">
    <thead class="">
        <tr>

            <th>#</th>
            <th>Imagen</th>
            <th>Nombre del producto</th>
            <th>Cantidad</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr> 
    </thead>
    <tbody>
        @foreach($productos as $producto)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td><img src="{{ asset('storage').'/'.$producto->Foto}}" alt="" width="200"></td>
                <td>{{$producto->Nombre}}</td>
                <td>{{$producto->Cantidad}}</td>
                <td>{{$producto->Descripcion}}</td>
                <td>
                <a href="{{ url('/productos/'.$producto->id.'/edit') }}" class="btn btn-success">Editar</a> 
                <a href="{{ url('/productos/'.$producto->id.'') }}" class="btn btn-warning">Mostrar</a> 
                <form action="{{url('/productos/'.$producto->id)}}" method="post">
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