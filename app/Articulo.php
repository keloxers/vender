<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    //
    protected $table = 'articulos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $fillable = ['articulo', 'descripcion', 'precio'];


}
