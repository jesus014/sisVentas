<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ClienteController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//ruta tipo resource

//Route::resource('almacen/categoria',CategoriaController::class);//declaracion de ruta completa
Route::resource('almacen/categoria','CategoriaController');
Route::resource('almacen/articulo','ArticuloController');
Route::resource('ventas/cliente','ClienteController');
Route::resource('compras/proveedor','ProveedorController');
Route::resource('compras/ingreso','IngresoController');


//Route::get('misvistas/mi_ruta/{id}', 'DocenteController@editarUsuario');
//Route::get('almacen/categoria/{id}','App\Http\Controllers\CategoriaController@destroy');
//Route::get('almacen/categoria/{categoria}/destoy', 'CategoriaController@destroy')->name('categoria.destroy');
//Route::get('almacen/categoria/{categoria}/update', 'CategoriaController@udapte')->name('categoria.update');
//Route::get('almacen/categoria/{categoria}/show', 'CategoriaController@show')->name('categoria.show');
//Route::get('almacen/categoria/{categoria}/edit', 'CategoriaController@edit')->name('categoria.edit');

