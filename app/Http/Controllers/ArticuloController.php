<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ArticuloFormRequest;
use App\Models\Articulo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Resources\Json\PaginatedResourceResponse;
use Symfony\Component\Console\Input\Input as InputInput;



class ArticuloController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request )
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $articulos=DB::table('articulo as a')
            ->join('categoria as c','a.idcategoria', '=','c.idcategoria')
            ->select('a.idarticulo','a.nombre','a.codigo','a.stock','c.nombre as categoria', 'a.descripcion','a.imagen','a.estado')
            ->where('a.nombre','LIKE','%'.$query.'%')
            -> orwhere('a.codigo','LIKE','%'.$query.'%')
            ->orderBy('idarticulo','desc')
            ->paginate(7);
            return view('almacen.articulo.index',["articulos"=>$articulos,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $categorias=DB::table('categoria')->where('condicion','=','1')->get();
        return view( 'almacen.articulo.create',["categorias"=>$categorias]);
    }

    public function store (ArticuloFormRequest $request)//almacenar el objeto en nuestra tabla categoria
    {
        $articulo=new Articulo;
        $articulo->idcategoria=$request->get('idcategoria');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock=$request->get('stock');
        $articulo->descripcion=$request->get('descripcion');
        $articulo->estado=('Activo');

        if (Input::hasFile('imagen')){

           $file= Input::file('imagen');
           $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
            $articulo->imagen=$file->getClientOriginalName();
         }


        //almacenamiento
        $articulo->save();
        return Redirect()->route('articulo.index');
       // return Redirect::to('almacen/categoria');

    }

    public function show($id)
    {
        return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);
    }

    public function edit($id)
    {
       //return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
        $articulo=Articulo::findOrFail($id);
        $categorias=DB::table('categoria')->where('condicion','=','1')->get();
        return view('almacen.articulo.edit',compact('articulo'));
        return view("almacen.articulo.edit",["articulo"=>$articulo,"categorias"=>$categorias]);

    }



    public function update(ArticuloFormRequest $request, $id)
    {
        $articulo=Articulo::findOrFail($id);
         $articulo->idcategoria=$request->get('idcategoria');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock=$request->get('stock');
        $articulo->descripcion=$request->get('descripcion');

        if(Input:: hasFile('imagen')){

            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/articulos/',$file->getClientOriginalName());
            $articulo->imagen=$file->getClientOriginalName();
         }

        $articulo->update();
        //las rutas se pueden presentar de las dos formas
        //return Redirect::to('almacen/categoria');
        return Redirect()->route('articulo.index');

    }

    public function destroy($id)
    {
        $articulo=Articulo::FindOrFail($id);
        $articulo->estado='Inactivo';
        $articulo->update();
        //return Redirect::to('almacen/categoria');
        return Redirect()->route('almacen.articulo');

    }




}
