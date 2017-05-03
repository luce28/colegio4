<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use Input;
use Redirect;
use DB;

class RegisterEstudianteController extends Controller
{

function index()
    {

 $estudiantes=DB::table('Estudiante')
            ->join('grado', 'grado.idGrado', '=', 'estudiante.idGrado')
            ->select('estudiante.idEstudiante','estudiante.documento','estudiante.nombre', 'estudiante.apellido','estudiante.celular','grado.grado')
            ->get();

        return view('listadoGrado',['estudiantes' => $estudiantes]);
    }



    //toma los datos del formulario estudiante  
public function postRegistrar()
{


  $userdata = array(
            'documento' => Input::get('documento'),
            'nombre'=> Input::get('nombre'),
         	'apellido' => Input::get('apellido'),
            'fechaNac'=> Input::get('fechaNac'),
        	'expedicion' => Input::get('expedicion'),
            'telefono'=> Input::get('telefono'),
        	'celular' => Input::get('celular'),
            'direccion'=> Input::get('direccion'),
			'peso' => Input::get('peso'),
            'tipoSangre'=> Input::get('tipoSangre'),
        	'anioActual' => Input::get('anioActual'),
            'condicion'=> Input::get('condicion'),
			'religion' => Input::get('religion'),
            'Grado'=> Input::get('grado'),
            'Acudiente_idAcudiente'=> Input::get('documentoAcu')        
        );

$acudientedata = array(
            'documentoPadre' => Input::get('documentoPadre'),
            'nombrePadre'=> Input::get('nombrePadre'),
         	'documentoMadre' => Input::get('documentomadre'),
            'nombremadre'=> Input::get('nombremadre'),
             'apellidoPadre'=> Input::get('apellidoPadre'),
             'apellidoMadre'=> Input::get('apellidoMadre'),
        	'ocupacionMadre' => Input::get('ocupacionMadre'),
            'ocupacionPadre'=> Input::get('ocupacionPadre'),
        	'celularPadre' => Input::get('celularPadre'),
            'celularMadre'=> Input::get('celularMadre'),
			'correoMadre' => Input::get('correoMadre'),
            'correoPadre'=> Input::get('correoPadre'),
        	'estadoCivil' => Input::get('estadoCivil'),
            'nombreAcu'=> Input::get('nombreAcu'),
			'documentoAcu' => Input::get('documentoAcu'),
            'celularAcu'=> Input::get('celularAcu'),
            'ocupacion'=> Input::get('ocupacion'), 
          	'correoAcu'=> Input::get('correoAcu'), 
          	'parentesco'=>Input::get('parentesco')            
        );




Estudiante::crearEstudiante($userdata,$acudientedata);
return Redirect::to('registroEstudiante')->with('success','Registro Exitoso');
}

//edit estudiante
public function edit($id)
{

$estudiante=DB::table('estudiante')
->join('grado', 'grado.idGrado', '=', 'estudiante.idGrado')
->join('acudiente', 'idAcudiente', '=', 'estudiante.Acudiente_idAcudiente')
->select('estudiante.idEstudiante','estudiante.nombre','estudiante.apellido','estudiante.fechaNac', 'estudiante.documento', 'estudiante.expedicion','estudiante.telefono','estudiante.celular','estudiante.direccion','estudiante.peso','estudiante.tipoSangre','estudiante.anioActual','estudiante.condicion','estudiante.religion','grado.grado','acudiente.idAcudiente','acudiente.documentoPadre','acudiente.nombrePadre','acudiente.nombremadre','acudiente.apellidoMadre','acudiente.apellidoPadre','acudiente.documentoMadre','acudiente.ocupacionPadre','acudiente.ocupacionMadre','acudiente.celularPadre','acudiente.celularMadre','acudiente.correoMadre','acudiente.correoPadre','acudiente.estadoCivil','acudiente.nombreAcu','acudiente.documentoAcu','acudiente.celularAcu','acudiente.ocupacion','acudiente.correoAcu','acudiente.parentesco')
->where('idEstudiante',$id)
->first();

                return \View::make('updateEstudiante',compact('estudiante'));

}
//update estudiante
public function update(Request $request)
{

   
              Estudiante::updateEstudiante($request);

             return redirect('listadoGrado');
}
//elimina registro de estudiante
public function destroy($id)
{
Estudiante::destroyEstudiante($id);

                return redirect('listadoGrado');
}

//buscar un usuario
public function search()
{
  $userdata = array(
            'documento' => Input::get('grado'),
            'nombre'=> Input::get('nombre'),
            );
 $estudiantes=Estudiante::name($userdata);


    return view('listadoGrado',['estudiantes' => $estudiantes]);
         

}

}
