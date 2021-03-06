<?php

namespace App;
use App\Role_user;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Caffeinated\Shinobi\Concerns\HasRolesAndPermissions;


class User extends Authenticatable
{
    use Notifiable, HasRolesAndPermissions;


    protected $table ="users";
    public $timestamps = false;
   

    protected $fillable = [
    'idRol',
    'nombre',
    'tipoDocumento',
    'identificacion',
    'email',
    'telefonoFijo',
    'celular',
    'direccion',
    'nombreUsuario',
    'password',
    'passwordc',
    'Estado',
    ];

    public function Role_user(){
        return $this -> belongsTo(Role_user::class);
    }
}
