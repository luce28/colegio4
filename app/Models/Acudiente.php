<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acudiente extends Model
{
   
  protected $table = 'Acudiente';
   
protected $primaryKey = 'idAcudiente'; 


//update un acudiente
public static function updateAcudiente($acudiente)
{
$acudienteModificar=Acudiente::find($acudiente->idAcudiente);

$acudienteModificar->documentoPadre=$acudiente->documentoPadre;
$acudienteModificar->nombrePadre=$acudiente->nombrePadre;
$acudienteModificar->nombremadre=$acudiente->nombremadre;
$acudienteModificar->apellidoMadre=$acudiente->apellidoMadre;
$acudienteModificar->apellidoPadre=$acudiente->apellidoPadre;
$acudienteModificar->documentoMadre=$acudiente->documentoMadre;
$acudienteModificar->ocupacionPadre=$acudiente->ocupacionPadre;

$acudienteModificar->ocupacionMadre=$acudiente->ocupacionMadre;
$acudienteModificar->celularPadre=$acudiente->celularPadre;
$acudienteModificar->correoMadre=$acudiente->correoMadre;
$acudienteModificar->correoPadre=$acudiente->correoPadre;
$acudienteModificar->estadoCivil=$acudiente->estadoCivil;

$acudienteModificar->nombreAcu=$acudiente->nombreAcu;
$acudienteModificar->documentoAcu=$acudiente->documentoAcu;
$acudienteModificar->celularAcu=$acudiente->celularAcu;
$acudienteModificar->ocupacion=$acudiente->ocupacion;
$acudienteModificar->correoAcu=$acudiente->correoAcu;
$acudienteModificar->parentesco=$acudiente->parentesco;


 $acudienteModificar->save();



} 



}
