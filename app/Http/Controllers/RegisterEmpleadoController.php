<?php

namespace App\Http\Controllers;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Input;
use Redirect;
use DB;


use Illuminate\Support\Collection;
//toma los datos del empleado
class RegisterEmpleadoController extends Controller
{
protected $table = 'Empleado';
   
protected $primaryKey = 'idEmpleado';

//devuelve una coleccion a la de lista empleado para mostrar tabla con el foreach
function index()
    {
    
       
 $empleados=DB::table('Empleado')
            ->join('grado', 'grado.idGrado', '=', 'empleado.Grado_idGrado')
            ->select('empleado.idEmpleado','empleado.documento','empleado.nombre', 'empleado.apellido', 'empleado.cargo','empleado.correo','grado.grado')
            ->get();

        return view('listadoEmpleado',['empleados' => $empleados]);
    }


    //toma los datos del formulario   
public function postRegistrar()
{


  $userdata = array(
            'documento' => Input::get('documento'),
            'nombre'=> Input::get('nombre'),
         	'apellido' => Input::get('apellido'),
            'nacionalidad'=> Input::get('nacionalidad'),
        	'telefono' => Input::get('telefono'),
            'correo'=> Input::get('correo'),
        	'direccion' => Input::get('direccion'),
            'fechaNacimiento'=> Input::get('fechaNacimiento'),
			'estudiosRealizados' => Input::get('estudiosRealizados'),
            'nivel'=> Input::get('nivel'),
        	'cargo' => Input::get('cargo'),
            'lugarEstudios'=> Input::get('lugarEstudios'),
			'tiempoTrabajo' => Input::get('tiempoTrabajo'),
            'fechaIngresoTrabajo'=> Input::get('fechaIngresoTrabajo'),
        	'valorNomina' => Input::get('valorNomina'),
            'estadoCivil'=> Input::get('estadoCivil'),
            'Grado_idGrado'=>Input::get('grado')
        );
Empleado::crearEmpleado($userdata);
return Redirect::to('registroEmpleado')->with('success','Registro Exitoso');

}

// para eliminar un empleado
public function destroy($id)
{
  Empleado::destroyEmpleado($id);

                return redirect('listadoEmpleado');
 
}
// para buscar un empleado
public function search()
{

}



 public function edit($id)
 {

$empleado=DB::table('Empleado')
->join('grado', 'grado.idGrado', '=', 'empleado.Grado_idGrado')
->select('empleado.idEmpleado','empleado.documento','empleado.nombre','empleado.apellido', 'empleado.nacionalidad', 'empleado.telefono','empleado.correo','empleado.direccion','empleado.fechaNacimiento','empleado.estudiosRealizados','empleado.nivel','empleado.cargo','empleado.lugarEstudios','empleado.tiempoTrabajo','empleado.fechaIngresoTrabajo','empleado.valorNomina','empleado.estadoCivil','empleado.fechaNacimiento','grado.grado','grado.idGrado')
->where('idEmpleado',$id)
->first();


 //$empleado = Empleado::find(['idEmpleado' => $id]);
                return \View::make('updateEmpleado',compact('empleado'));
 }

public function update(Request $request)
 {
               Empleado::updateEmpleado($request);

                return redirect('listadoEmpleado');
 
 }

}
