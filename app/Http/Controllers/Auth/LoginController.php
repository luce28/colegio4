<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use Input;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/menu';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
    $this->middleware('guest', ['except' => 'logout']);
 // $this->middleware('auth');

    }
    


    /*muestra despues de login*/

    public function showLoginForm()
    {

// Verificamos que el usuario no esté autenticado
        if (Auth::check())
        {
            // Si está autenticado lo mandamos a la raíz donde estara el mensaje de bienvenida.
            return Redirect::to('/menu');
        }
        // Mostramos la vista login.blade.php (Recordemos que .blade.php se omite.)
        return View::make('/welcome');
    }



/**
     * Valida los datos del usuario.
     */
public function postLogin()
{

$nombre=Input::get('nombre');
$contrasena=Input::get('contrasena');

$users = DB::table('Administrador')->get();

foreach ($users as $user) {    
    if($user->nombre==$nombre and  $user->contrasena==$contrasena)
         return Redirect::to('/menu');
}

 return Redirect::to('/login')
    ->with('mensaje_error', 'Tus datos son incorrectos')
    ->withInput();


}



//cerrar sesion
public function logout(){
 //   Session::flush();
     return Redirect::to('/login');
} 



}
