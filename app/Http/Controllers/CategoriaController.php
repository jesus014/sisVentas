<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaFormRequest;
use Illuminate\Http\Resources\Json\PaginatedResourceResponse;
use DB;

class CategoriaController extends Controller
{
    //mostracion para trabajar con las vistas o el controlador

    public function __construct()
    {

    }

    public function index(Request $request )
    {
        if($request)
        {

            $query=trim($request->get('searchText'));
            $categorias =DB ::table('categoria')->where('nombre','LIKE','%'.$query.'%')
            ->where('condicion','=','1')
            ->orderBy('idCategoria','desc');
            return view('almacen.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
        }
    }

    public function create()
    {

        return view( "alamcen.categoria.create");
    }

    public function store (CategoriaFormRequest $request)//almacenar el objeto en nuestra tabla categoria
    {
        $categoria=new Categoria;
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('nombre');
        $categoria->condicion='1';
        //almacenamiento
        $categoria->save();
        return Redirect ::to('almacen/categoria');
    }

    public function show($id)
    {
        return view("almacen/categoria/show",["categoria"=>Categoria::finndOrFail($id)]);
    }

    public function edit($id)
    {
        return view("almacen/categoria/edit",["categoria"=>Categoria::finndOrFail($id)]);

    }


    public function update(CategoriaFormRequest $request, $id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->update();
        return Redirect::to('almacen/categoria');
    }

    public function destroy($id)
    {
        $categoria=Categoria::FindOrFail($id);
        $categoria->condicion='0';
        $categoria->update();
        return Redirect::to('almacen/categoria');
    }







}
