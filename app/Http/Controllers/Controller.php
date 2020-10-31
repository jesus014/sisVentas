<?php
//un controllador usualmente trabaja asociado con las peticiones
//route resource creara un grupo de rutas de recurso con las peticiones index, create,show edit, store, update
//http request validacion de datos
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
