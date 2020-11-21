@extends('layout.layout')

@section('titulo')
CRUD CATEGORIA EDITAR
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
<form action="{{ url('/categorias/'.$categoria->id) }}" method="post" enctype="multipart/form-data">  
    @csrf
    @method('PATCH')
    
    <label for="Nombre">{{'Nombre'}}</label>
    <input type="text" name="Nombre" id="Nombre" value="{{ $categoria->Nombre }}" class="form-control">
    <br>
    <label for="Descripcion">{{'Descripcion'}}</label>
    <input type="text" name="Descripcion" id="Descripcion" value="{{ $categoria->Descripcion }}"class="form-control">
    <br>
    <label for="Cantidad">{{'Cantidad'}}</label>
    <input type="number" name="Cantidad" id="Cantidad" value="{{ $categoria->Cantidad }}"class="form-control">
    <br>
    <label for="Foto">{{'Foto'}}</label>
    <br>
    <td><img src="{{ asset('storage').'/'.$categoria->Foto}}" alt="" width="200"></td>
    <br>
    <input type="file" name="Foto" id="Foto" value="">
    <br>
    <br>
    <input type="submit" value="Modificar" class="btn btn-success">
    <a href="{{ url('categorias') }}" class="btn btn-primary">Regresar</a>
</form>
@endsection
