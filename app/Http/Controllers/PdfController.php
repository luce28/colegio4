<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use PDF;
use DB;

class PdfController extends Controller
{
    



//permite crear la vista 
 public function htmltopdfview(Request $request)
    {
        $empleados = Empleado::all();
        view()->share('empleados',$empleados);
        if($request->has('download')){
            $pdf = PDF::loadView('htmltopdfview');
            return $pdf->download('htmltopdfview.pdf');
        }
        return view('htmltopdfview');
    }


// ver informacion empleado
public function pdf_empleado($id)
{
$user=DB::table('Empleado')
->join('grado', 'grado.idGrado', '=', 'empleado.Grado_idGrado')
->select('empleado.documento','empleado.nombre','empleado.apellido', 'empleado.nacionalidad', 'empleado.telefono','empleado.correo','empleado.direccion','empleado.fechaNacimiento','empleado.estudiosRealizados','empleado.nivel','empleado.cargo','empleado.lugarEstudios','empleado.tiempoTrabajo','empleado.fechaIngresoTrabajo','empleado.valorNomina','empleado.estadoCivil','empleado.fechaNacimiento','grado.grado')
->where('idEmpleado',$id)
->first();

//var_dump($user);


 //$user = Empleado::where('idEmpleado',$id)->first();
 // var_dump($user);
  $headers = array(
              'Content-Type: application/pdf',
            );

     $pdf = PDF::loadView('pdfvista',['user' => $user]);
return $pdf->download('ResumenInformacion.pdf',$headers);

}

//imprime un pdf con informacion del estudiante
public function pdf_estudiante($id)
{
$user=DB::table('estudiante')
->join('grado', 'grado.idGrado', '=', 'estudiante.idGrado')
->join('acudiente', 'idAcudiente', '=', 'estudiante.Acudiente_idAcudiente')
->select('estudiante.nombre','estudiante.apellido','estudiante.fechaNac', 'estudiante.documento', 'estudiante.expedicion','estudiante.telefono','estudiante.celular','estudiante.direccion','estudiante.peso','estudiante.tipoSangre','estudiante.anioActual','estudiante.condicion','estudiante.religion','grado.grado','acudiente.documentoPadre','acudiente.nombrePadre','acudiente.nombremadre','acudiente.apellidoMadre','acudiente.apellidoPadre','acudiente.documentoMadre','acudiente.ocupacionPadre','acudiente.ocupacionMadre','acudiente.celularPadre','acudiente.celularMadre','acudiente.correoMadre','acudiente.correoPadre','acudiente.estadoCivil','acudiente.nombreAcu','acudiente.documentoAcu','acudiente.celularAcu','acudiente.ocupacion','acudiente.correoAcu','acudiente.parentesco')
->where('idEstudiante',$id)
->first();

$headers = array(
              'Content-Type: application/pdf',
            );
     $pdf = PDF::loadView('pdfvistaEstudiante',['user' => $user]);
return $pdf->download('ResumenInformacionEstudiante.pdf',$headers);

}

}
