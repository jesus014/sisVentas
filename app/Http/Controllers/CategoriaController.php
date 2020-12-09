<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Categoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Resources\Json\PaginatedResourceResponse;


class CategoriaController extends Controller
{
    //mostracion para trabajar con las vistas o el controlador

    public function __construct()
    {

    }

    public function index(Request $request )
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $categorias=DB::table('categoria')->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('idcategoria','desc')
            ->paginate(7);
            return view('almacen.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
        }
    }

    public function create()
    {

        return view( 'almacen.categoria.create');
    }

    public function store (Request $request)//almacenar el objeto en nuestra tabla categoria
    {
        $categoria=new Categoria;
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->condicion='1';
        //almacenamiento
        $categoria->save();
        return Redirect()->route('categoria.index');
       // return Redirect::to('almacen/categoria');

    }

    public function show($id)
    {
        return view("almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
    }

    public function edit($id)
    {
      //  return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
        $categoria=Categoria::findOrFail($id);
        return view('almacen.categoria.edit',compact('categoria'));

    }



    public function update(Request $request, $id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->nombre=$request->input('nombre');
        $categoria->descripcion=$request->input('descripcion');
        $categoria->update();
        //return Redirect::to('almacen/categoria');
        return Redirect()->route('categoria.index');

    }

    public function destroy($id)
    {
        $categoria=Categoria::FindOrFail($id);
        $categoria->condicion='0';
        $categoria->update();
        return Redirect::to('almacen/categoria');
    }







}
