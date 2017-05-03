<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/pdf', function () {
    return view('probarPDf');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('welcome');
});

Route::get('/menu',function(){
	 return view('menu');
});
Route::get('/reciboEstudiante',function(){
	 return view('reciboEstudiante');
});
Route::get('/reciboEmpleado',function(){
	 return view('reciboEmpleado');
});
Route::get('/alertas',function(){
	 return view('alertas');
});

Route::get('/listadoGrado',function(){
	 return view('listadoGrado');
});

//lista empleado
Route::get('/listadoEmpleado', ['as' => 'listadoEmpleado', 'uses' => 'RegisterEmpleadoController@index']);

//lista Grado
Route::get('/listadoGrado', ['as' => 'listadoGrado', 'uses' => 'RegisterEstudianteController@index']);

/*
Route::get('/listadoEmpleado',function(){
	 return view('listadoEmpleado');
});
*/

Route::get('/envioEmail','AlertasController@basic_email');

//para enviar correo
Route::post('/correo','AlertasController@post');

//para poder logearse
Route::post('/logear','Auth\LoginController@postLogin');


//registrar un administrador
Route::post('/registrar','Auth\RegisterController@postRegistrar');

Route::get('/registroUsuario',function(){
	 return view('registroUsuario');
});


//registrar un empleado
Route::post('/registrarEmpleado','RegisterEmpleadoController@postRegistrar');

Route::get('/registroEmpleado',function(){
	 return view('registroEmpleado');
});

// registra estudiante
Route::post('/registrarEstudiante','RegisterEstudianteController@postRegistrar');

Route::get('/registroEstudiante',function(){
	 return view('registroEstudiante');
});
/////////////////////////////////////////


//para poder cerrar sesion
Route::get('/salir','Auth\LoginController@logout');

//para generar el pdf
Route::get('htmltopdfview',array('as'=>'htmltopdfview','uses'=>'PdfController@htmltopdfview'));

// generar el pdf de un empleado
Route::get('/hojavida/{id}','PdfController@pdf_empleado');


/*rutas que permitiran el manejo de gestion de los empleados*/
Route::post('empleado/update', ['as' => 'empleado/update', 'uses'=>'RegisterEmpleadoController@update']);
Route::get('empleado/edit/{id}', ['as' => 'empleado/edit', 'uses'=>'RegisterEmpleadoController@edit']);
Route::get('empleado/destroy/{id}', ['as' => 'empleado/destroy', 'uses'=>'RegisterEmpleadoController@destroy']);
Route::post('empleado/search', ['as' => 'empleado/search', 'uses'=>'RegisterEmpleadoController@search']);

/*rutas que permitiran el manejo de gestion de los estudiantes*/
Route::get('/hojaEstudiante/{id}','PdfController@pdf_estudiante');
Route::put('estudiante/update', ['as' => 'estudiante/update', 'uses'=>'RegisterEstudianteController@update']);
Route::get('estudiante/edit/{id}', ['as' => 'estudiante/edit', 'uses'=>'RegisterEstudianteController@edit']);
Route::get('estudiante/destroy/{id}', ['as' => 'estudiante/destroy', 'uses'=>'RegisterEstudianteController@destroy']);
//para buscar un estudiante
Route::post('/buscarEstudiante','RegisterEstudianteController@search');


/*
// Nos indica que las rutas que están dentro de él sólo serán mostradas si antes el usuario se ha autenticado.
Route::group(array('before' => 'auth'), function()
{


Route::get('/registroUsuario',function(){
	 return view('registroUsuario');
});

Route::get('/alertas',function(){
	 return view('alertas');
});

Route::get('/registroEmpleado',function(){
	 return view('registroEmpleado');
});

Route::get('/menu',function(){
	 return view('menu');
});

Route::get('/registroEstudiante',function(){
	 return view('registroEstudiante');
});
Route::get('/welcome',function(){
	 return view('welcome');
});
Route::get('/listadoGrado',function(){
	 return view('listadoGrado');
});

Route::get('/listadoEmpleado',function(){
	 return view('listadoEmpleado');
});

Route::get('/', function () {
    return view('welcome');
});

    // Esta ruta nos servirá para cerrar sesión.
    Route::get('logout', 'AuthController@logOut');
});

*/

/*+++++++++++++++++++*/ 
//Auth::routes();


//Route::get('/home', 'HomeController@index');
/*
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/passwords', function () {
    return view('auth.passwords.email');
});
*/
 

//Auth::routes();


