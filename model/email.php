<?php 


/**
 * 
 */
declare(strict_types=1);
date_default_timezone_set('Etc/UTC');
require_once('pluggins/PHPMailer/PHPMailer.php');
require_once('pluggins/PHPMailer/SMTP.php');
require_once('pluggins/PHPMailer/Exception.php');


class Email {
	
	function __construct()
	{
		# code...
	}

	public static function email(string $email, string $nombre):bool{

		

		$mail = new PHPMailer\PHPMailer\PHPMailer();

		//$mail->SMTPDebug = 2;                               // Enable verbose debug output

		$correo = $email;
		$mensaje = 'Usted Recibira Información del sitio Aspen Truck, gracias por confiar en nosotros';
		$nombreCorreo = $nombre;
		$asunto = " Bienvenid@ a Aspen trucks {$nombreCorreo}";
	
		$mail->isSMTP();
        $mail->Mailer = "smtp";                                      // Set mailer to use SMTP
		$mail->Host = "ssl://smtp.gmail.com";
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'singingfool012@gmail.com';        // SMTP username
		$mail->Password = '92010101460';                        // SMTP password
		$mail->SMTPSecure = 'true';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;   

		$mail->Priority = 1;                                 // TCP port to connect to

		$mail->setFrom('singingfool012@hotmail.com', 'Mailer');
		$mail->addAddress($correo, $nombreCorreo);
		$mail->AddCC('carlos.arboleda@netfor.com.co');     

		$mail->Subject = $asunto;
		$mail->Body    = $mensaje;

		if(!$mail->send()) {
			    //echo 'Error, mensaje no enviado';
			    //echo 'Error del mensaje: ' . $mail->ErrorInfo;
			    return false;
			} else {
			    //echo 'El mensaje se ha enviado correctamente';
			    return true;
			    
			}
	}
}

?>