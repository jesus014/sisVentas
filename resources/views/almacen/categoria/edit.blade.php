@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12">

        <h3> Editar categoria:{{$categoria->nombre}} </h3>



        <form action="{{route('categoria.update',$categoria->id)}}" method="post">
         @csrf
         @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{$categoria->nombre}}" >
            </div>

            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" name="descripcion" class="form-control" value="{{$categoria->descripcion}}" >
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">cancelar</button>

            </div>
        </form>
    </div>
</div>

@endsection
