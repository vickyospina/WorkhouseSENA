<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $timestamps = false;
<<<<<<< HEAD

    protected $table = 'clientes';

    protected $fillable = [
        'idUsuario',
        'nombreCliente',
        'tipoIdentificacion',
        'numeroIdentificacion',
        'direccion',
        'telefonoFijo',
        'celular'
    ];
=======
>>>>>>> 60e845988dfea17ff9c3adfef7e102770ba01097
}
