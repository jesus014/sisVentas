@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12">
        @if(count($errors)>0)
        <h3> Nueva categoria </h3>
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif



         <form action="{{route('categoria.store')}}" method="post">
         @csrf

             <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" placeholder="nombre...">
          </div>

            <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion" class="form-control" placeholder="Descripcion...">
            </div>

            <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">cancelar</button>

            </div>
        </form>
    </div>
</div>

@endsection
