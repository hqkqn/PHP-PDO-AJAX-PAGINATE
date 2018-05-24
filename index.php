<!DOCTYPE html>
<html lang="es">
<?php require_once("controller/vehiculoController.php"); ?>
<?php require_once("controller/clienteController.php"); ?>
<head>
 <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- jquery -->
<script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
<!-- Bootstrap JS -->
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<!-- Index CSS -->
<link rel="stylesheet" type="text/css" href="assets/css/index.css">

<title>Landing Page</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col">
				<p class="text_form_bold">Completa este formulario</p>
				<p class="text_form">y entérate porque somos una marca superior</p>
				<img class="truck" src="assets/img/truck.png" height="500" width="500">
			</div>

			<div class="col">
				<div class="alert alert-success" role="alert" style="<?php echo $style_success;?>">
					<?php echo $success_form;?>
				</div>
				<div class="alert alert-danger" role="alert" style="<?php echo $style_error;?>">
					<?php echo $nombreMessage.' '.$nombreValidacion; ?>
					<?php echo $apellidoMessage.' '.$apellidoValidacion; ?>
					<?php echo $celularMessage.' '.$celularValidacion; ?>
					<?php echo $correoMessage.' '.$emailValidacion; ?>
					<?php echo $generoMessage; ?>
				</div>
				<div class="alert alert-warning" role="alert" style="<?php echo $style_warning;?>">
					<?php echo $error_form;?>
				</div>
		  		<form class="form-horizontal" method="POST" action="index.php">
					<div class="row">
						<div class="col">
							<input type="text" name="nombre" class="form-control" placeholder="Nombres" 
							oninvalid="this.setCustomValidity('Por favor ingresa tú Nombre')"
 							oninput="setCustomValidity('')" required >
						</div>
						<div class="col">
							<input type="text" name="apellido" class="form-control" placeholder="Apellidos" 
							oninvalid="this.setCustomValidity('Por favor ingresa tú Apellido')"
 							oninput="setCustomValidity('')" required >
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<input type="text" name="celular" class="form-control" placeholder="Número de celular" oninvalid="this.setCustomValidity('Por favor ingresa un Número Celular')"
 							oninput="setCustomValidity('')" required >
						</div>
						<div class="col">
							<label for="inputGenero" class="text_genero">Género: </label>
							<div class="btn-group" data-toggle="buttons">
							  <label class="btn btn-primary active">
							    <input type="radio" name="options_genero" id="option1" autocomplete="off" value="masculino" checked > M
							  </label>
							  <label class="btn btn-primary margin_left">
							    <input type="radio" name="options_genero" id="option2" autocomplete="off" value="femenino" > F
							  </label>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<input type="" name="correo" class="form-control" placeholder="Correo Electronico"  oninvalid="this.setCustomValidity('Por favor ingrese un Correo Electronico valido')"
 							oninput="setCustomValidity('')" 
							pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"
 							required>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<label for="inputGenero" class="text_vehiculo">Vehiculo Actual: </label>
						</div>
						<div class="col"> 
							<?php echo $getMarca; ?>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<div id="modelo">
								<select class="form-control">
							      <option>--Modelo--</option>
							      <option>--</option>
							    </select>
							</div>
						</div>
						<div class="col"> 
							<div id="linea">
								<select class="form-control">
							      <option>--Linea--</option>
							      <option>--</option>
							    </select>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<div class="rectangulo"><div class="rectangulo_text">¿En cuanto tiempo piensas estrenar?</div></div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<div class="btn-group" data-toggle="buttons">
							  <label class="btn btn-primary active">
							    <input type="radio" name="tiempo_estrenar" value="1-3" id="option2" autocomplete="off" checked> 1-3 Meses
							  </label>
							  <label class="btn btn-primary margin_left">
							    <input type="radio" name="tiempo_estrenar" value="3-6" id="option3" autocomplete="off"> 3-6 Meses
							  </label>
							  <label class="btn btn-primary margin_left">
							    <input type="radio" name="tiempo_estrenar" value="6" id="option3" autocomplete="off"> Más de 6 meses
							  </label>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<div class="text_interes">¿En que vehiculo esta interesado?</div>
						</div>
						<div class="col">
							<img class="truck" src="assets/img/bus.png" height="80" width="100">
							<div align="center">
								<input type="radio" value="bus" name="car_select" id="option1" autocomplete="off" checked="">
							</div>
						</div>
						<div class="col">
							<img class="truck" src="assets/img/car.png" height="80" width="100">
							<div align="center">
								<input type="radio" value="car" name="car_select" id="option2" autocomplete="off">
							</div>
						</div>
						<div class="col">
							<img class="truck" src="assets/img/truck_mini.png" height="80" width="100">
							<div align="center">
								<input type="radio" value="truck" name="car_select" id="option3" autocomplete="off">
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<div class="rectangulo"><div class="rectangulo_text">¿Requiere financiación sin interes?</div></div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<div class="btn-group" data-toggle="buttons">
							  <label class="btn btn-primary active">
							    <input type="radio" value="12"name="interes" id="option2" autocomplete="off" checked> 12 Meses
							  </label>
							  <label class="btn btn-primary margin_left">
							    <input type="radio" value="36" name="interes" id="option3" autocomplete="off"> 36 Meses
							  </label>
							  <label class="btn btn-primary margin_left">
							    <input type="radio" value="60" name="interes" id="option3" autocomplete="off"> 60 Meses
							  </label>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<div class="text_autorizo">
							    <input type="checkbox" name="financiacion" value="1" id="option1" autocomplete="off"> 
							    Autorizo a Aspen Trucks a que me envíe información 
							    comercial via E-mail,télefono,mensajes de texto correo.<br>
							    Conozca mas sobre nuestra politica de privacidad,
							    haciendo click aquí.
							</div>  
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col" >
							<div align="right">
								<input type="submit" class="btn btn_submit" id="button_send" value="Enviar">
							</div>
						</div>
					</div>
				</form>

			</div>
	  	</div>
	</div>
	<script type="text/javascript" src="assets/js/index.js"></script>
</body>
</html>