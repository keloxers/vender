<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clasificadoscategoria extends Model
{
    //
    protected $table = 'clasificadoscategorias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $fillable = ['clasificadoscategoria', 'activo'];

}
