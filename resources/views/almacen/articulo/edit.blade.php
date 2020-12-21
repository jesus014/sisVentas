@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12">

        <h3> Editar articulo:{{$articulo->nombre}} </h3>

    </div>
</div>

<form action="{{route('articulo.update',$articulo->idarticulo)}}" method="post" files='true'>
         @csrf
         @method('PUT')
    <div class="row">
   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
         <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" required value="{{$articulo->nombre}}" >
          </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class='form-group'>
            <label>Categoria</label>
            <select name="idcategoria" class="form-control" id=""></select>
            @foreach ($categorias as $cat)
                 @if($cat->idcategoria==$articulo->idcategoria)
                <option value="{{$cat->idcategoria}}" selected>{{$cat->nombre}}</option>
                @else
                <option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>

            @endforeach
        </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
         <div class="form-group">
            <label for="codigo">Codigo</label>
            <input type="text" name="codigo" class="form-control" required value="{{$articulo->codigo}}" >
          </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label for="strock">stock</label>
            <input type="text" name="stock" class="form-control" required value="{{$articulo->stock}}" >
          </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label for="strock">Descripcion</label>
            <input type="text" name="Descripcion" class="form-control"  value="{{$articulo->descripcion}}" >
          </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label for="strock">Imagen</label>
            <input type="file" name="imagen" class="form-control"   >
             @if(($articulo->imagen)!="")
                <img src="{{asset('imagenes/articulos/'.$articulo->imagen')}}" height="300px" width="300px">
             @endif
          </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

        <div class="form-group">
             <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">cancelar</button>
          </div>

    </div>
</div>
</div>
</div>
 </form>


@endsection
