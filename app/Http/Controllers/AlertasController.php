<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Redirect;
use Illuminate\Contracts\Mail\Mailer;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;



class AlertasController extends Controller
{
    

// para enviar email 
public function post()
{
	
$email=Input::get('email');
$mensaje=Input::get('mensaje');
$asunto=Input::get('asunto');



 $data_toview = array();
            $data_toview['name'] = $mensaje;
 
            $email_sender   = "92ramirescortes@gmail.com";
            $email_pass     = 'llanitos3012';
            $email_to    = $email;
 
            // Backup your default mailer
            $backup = \Mail::getSwiftMailer();
 
            try{
            
                        //https://accounts.google.com/DisplayUnlockCaptcha
                        // Setup your gmail mailer
                        $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 587, 'tls');
                        $transport->setUsername($email_sender);
                        $transport->setPassword($email_pass);
 
                        // Any other mailer configuration stuff needed...
                        $gmail = new Swift_Mailer($transport);
 
                        // Set the mailer as gmail
                        \Mail::setSwiftMailer($gmail);
 
                        $data['emailto'] =$email_to;  
                        $data['sender'] = $email_sender;
                        $data['asunto']=$asunto;
                        //Sender dan Reply harus sama
 
                        Mail::send('emails.html', $data_toview, function($message) use ($data)
                        {
 
                            $message->from($data['sender'], 'Colegio Bello Horizonte');
                            $message->to($data['emailto'])
                            ->replyTo($data['sender'], 'Colegio Bello Horizonte')
                            ->subject($data['asunto']);
 
                            echo 'The mail has been sent successfully';
 
                        });
 
            }catch(\Swift_TransportException $e){
                $response = $e->getMessage() ;
                echo $response;
            }
 
 
            // Restore your original mailer
            Mail::setSwiftMailer($backup);
 

return Redirect::to('alertas')->with('success','Envio  Exitoso');

}


//  funcion

public  function basic_email()
{
    $data=['name'=>'Colegio Bello Horizonte'];
    Mail::send(['text'=>'emails.html'],$data,function($message){
        $message->to('92ramirescortes@gmail.com','Colegio Bello horizonte')->subject('envio correo laravel');
        $message->from('92ramirescortes@gmail.com','Colegio Bello Horizonte');       
    });
    echo 'email enviado';

}


}
