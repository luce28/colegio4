<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Input;
use DB;

class Administrador extends Model
{
   

protected $table="Administrador";

    /**
     * Get the totalMes  record associated with the user.
     */
    public function totalMes()
    {
        return $this->hasOne(totalMes::class);
    }

	/**
     * Get the  totalAnio associated with the user.
     */
    public function totalAnio()
    {
        return $this->hasOne(totalAnio::class);
    }


public static function crearAdministrador($data)
{ 
$documento=$data['documento'];
$nombre=$data['nombre'];
$apellido=$data['apellido'];
$contrasena=$data['contrasena'];
$telefono=$data['telefono'];
$usuario=$data['usuario'];
$direccion=$data['direccion'];
$correo=$data['correo'];

DB::table('Administrador')->insert(array(
           'documento'=>$documento, 
          'nombre'=> $nombre,
            'apellidos'=> $apellido,
            'contrasena'=> $contrasena,
            'telefono' => $telefono,
            'correo' => $correo,
            'nombreUsuario' => $usuario,
            'direccion'=>$direccion            
        )); 

}

}
