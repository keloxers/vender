<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    //
    protected $table = 'mensajes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $fillable = ['usersid_emisor', 'usersid_receptor', 'leido', 'mensaje'];

}
