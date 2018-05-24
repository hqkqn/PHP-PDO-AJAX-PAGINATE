<!DOCTYPE html>
<html lang="es">
<?php require_once("../controller/clienteController.php"); ?>
<head>
 <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- jquery -->
<script type="text/javascript" src="../assets/js/jquery-3.3.1.js"></script>
<!-- Bootstrap JS -->
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<title></title>
</head>
<body>
	<br><br>
<div class="container">
	<div class ="row">
		<div class ="col">
			<input type="text" name="buscar" id="buscar" placeholder="buscar persona" class="form-control">
			<br><br>
			<div  id="table">
			</div>
				<!-- Paginación -->
				<div class="d-flex justify-content-center paginas" >
					<nav aria-label="Page navigation example" class="">
					  <ul class="pagination" id="pagination">
							
					  </ul>
					</nav>
				</div>
				<!-- Fin Paginación -->
		</div>
	</div>
</div>
</body>
<script type="text/javascript" src="../assets/js/client.js"></script>
</html>