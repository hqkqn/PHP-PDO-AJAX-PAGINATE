<?php 
require_once("model/cliente.php");	
require_once("model/informacion.php");	
require_once("model/email.php");	
$nombreMessage = "";
$nombreValidacion = "";
$apellidoMessage = "";
$celularMessage = "";
$correoMessage = "";
$generoMessage = "";
$success_form = '';
$error_form = '';
$style_success = 'display: none';
$style_error = 'display: none';
$style_warning = 'display: none';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if(isset($_POST["nombre"]) && $_POST["nombre"] != ''){
		$name = $_POST["nombre"];
		// se hace una validacion con expresion regular para la cadena del nombre entre a-z y la A-Z
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
	   		$nombreValidacion = "El nombre no es valido. <br>";
	   		$style_error = 'display: block';
	   	}else{
			$nombreMessage = "";
			$nombre = $_POST["nombre"];
			$style_error = '';
	   	}
	}else{
		$nombreMessage = "El nombre no debe estar vacio. <br>";
		$style_error = 'display: block';
	}

	if(isset($_POST["apellido"]) && $_POST["apellido"] != ''){
		$last_name = $_POST["apellido"];
		if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
	   		$apellidoValidacion = "El apellido no es valido. <br>";
	   		$style_error = 'display: block';
	   	}else{
			$apellidoMessage = "";
			$apellido = $_POST["apellido"];
			$style_error = '';
	   	}

	}else{
		$apellidoMessage = "El apellido no debe estar vacio. <br>";
		$style_error = 'display: block';
	}

	if(isset($_POST["celular"]) && $_POST["celular"] != ''){
		// se hace una validacion con expresion regular para el celular entre 0-9
		$phone = intval($_POST["celular"]);
		if (!preg_match("/^[1-9]\d*$/",$phone)) {
	   		$celularValidacion = "El celular no es valido. <br>";
	   		$style_error = 'display: block';
	   	}else{
			$celularMessage = "";
			$celular = intval($_POST["celular"]);
			$style_error = '';
	   	}
	}else{
		$celularMessage = "El celular no debe estar vacio. <br>";
		$style_error = 'display: block';
	}

	if(isset($_POST["correo"]) && $_POST["correo"] != ''){
		$mail = $_POST["correo"];
		if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
	      	$emailValidacion = "Por favor Ingrese un correo valido.";
	      	$style_error = 'display: block';
	    }else{
		    $correoMessage = "";
			$correo = $_POST["correo"];
			$style_error = '';
	    }

	}else{
		$correoMessage = "El correo no debe estar vacio.";
		$style_error = 'display: block';
	}

	if(isset($_POST["options_genero"]) && $_POST["options_genero"] != ''){
		$generoMessage = "";
		$genero = $_POST["options_genero"];
		$style_error = '';
	}else{
		$generoMessage = "El genero no debe estar vacio. <br>";
		$style_error = 'display: block';
	}
	//valida si esta seteados todos los datos del cliente para agregarlo en la bbdd
	if(isset($nombre) && $nombre !='' && isset($apellido) && $apellido !='' && isset($celular) && $celular !='' && isset($correo) && $correo !='' && isset($genero) && $genero !=''){
		$cliente = new Client($nombre,$apellido,$celular,$correo,$genero);
		$id_cliente = $cliente->getId();
		//si el cliente se agregao se devuelve un id que se valida el resto de la información
		if($id_cliente != ''){
			$marca = isset($_POST['marca'])?$_POST['marca']:'';
			$modelo = isset($_POST['modelo'])?$_POST['modelo']:'';
			$linea = isset($_POST['linea'])?$_POST['linea']:'';
			$tiempo_estrenar = isset($_POST['tiempo_estrenar'])?$_POST['tiempo_estrenar']:'1-3';
			$car_select = isset($_POST['car_select'])?$_POST['car_select']:'car';
			$interes = isset($_POST['interes'])?$_POST['interes']:12;
			$financiacion = isset($_POST['financiacion'])?$_POST['financiacion']:0;
			$informacion = new Information($id_cliente,$marca,$modelo,$linea,$tiempo_estrenar,$car_select,$interes,$financiacion);
			// se hace una instancia del objeto email para enviar los correos
			if($financiacion == 1){
				$email = new Email();
				$nombre_completo = $nombre.' '.$apellido;
				$send_mail = $email->email($correo,$nombre_completo);
				if($send_mail == 1){
					$success_form = 'Se envío la información correctamente, espera boletines pronto. <br>';
					$style_success = 'display: block';
					$style_warning = 'display: none';
					$style_error= 'display: none';
				}else{
					$error_form = 'No se envío el correo. <br>';
					$style_success = 'display: none';
					$style_error = 'display: none';
					$style_warning = 'display: block';
				}
			}else{
					$success_form = 'Se ha guardado su información, gracias. <br>';
					$style_success = 'display: block';
					$style_warning = 'display: none';
					$style_error= 'display: none';
			}
			
		}else{
			echo'El usuario no fue agregado correctamente';
		}
	}

}

			
	
?>