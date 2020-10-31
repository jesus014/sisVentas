<?php
//rutas:peticiones http, 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table='categoria';
    protected $primaryKey='idcategoria';
    public $timestamps=false;

    protected $fillable =[ //campos que son necesarios que se llenen por el usuario
        'nombre',
        'descripcion',
        'condicion',

    ];



}
