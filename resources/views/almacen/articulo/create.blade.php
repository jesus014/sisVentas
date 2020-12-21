@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12">
        @if(count($errors)>0)
        <h3> Nuevo Articulo </h3>
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

    </div>

</div>

         <form action="{{route('articulo.store')}}" method="post" files=>'true'>
         @csrf
<div class="row">
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
         <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" required value="{{old('nombre')}}" placeholder="nombre...">
          </div>

    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class='form-group'>
            <label>Categoria</label>
            <select name="idcategoria" class="form-control" id=""></select>
            @foreach ($categorias as $cat)
                <option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
            @endforeach
        </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
         <div class="form-group">
            <label for="codigo">Codigo</label>
            <input type="text" name="codigo" class="form-control" required value="{{old('codigo')}}" placeholder="codigo...">
          </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label for="strock">stock</label>
            <input type="text" name="stock" class="form-control" required value="{{old('stock')}}" placeholder="stock de articulo...">
          </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label for="strock">Descripcion</label>
            <input type="text" name="Descripcion" class="form-control"  value="{{old('descripcion')}}" placeholder="descripcion del articulo...">
          </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label for="strock">Imagen</label>
            <input type="file" name="imagen" class="form-control"   >
          </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

        <div class="form-group">
             <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">cancelar</button>
          </div>

    </div>
</div>



@endsection
