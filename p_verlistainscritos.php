<script>
	function errorSession(){
		alert("Usted no tiene permiso de guía");
		window.location = "index.php";
	}
</script>
<?php
    require 'isLoginGuia.php';
    include 'conexion.php';
    if (isset($_SESSION["usuarioguia"])) {
    }
    else{
    	echo "<script>errorSession()</script>";
    }
    mysqli_close($conexion);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/styleb6.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:700&display=swap" rel="stylesheet">
	<script src="js/jqueryajax.js"></script>
	<script src="js/funciones17.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="jquery-3.3.1.slim.min"></script>
	<script src="popper.min"></script>
	<script>
		$(document).ready(function() {
			//boton registrar
			$("#btnIniciar").click(function(){
				var parametros = {
					correo: $("#txtCorreoL").val(),
					contraseña: $("#txtContraseñaL").val()
				};
				$.ajax({
				url: 'p_login.php',
				type: 'post',
				data: parametros,
				error: function(){
					//definir un proceso en el caso de algun error
					alert("Ha ocurrido un error");
				},
				beforeSend: function(){
					// mostrar algo antes de que cargue el archivo del servidor
					// gif
					$("#cargando1").html("<img src='img/loading2.gif'width='200px' height='200px' />");
				},
				success: function(parametroRetorno){
					// mostrar el resultado del archivo
					$("#cargando1").html(parametroRetorno);
				}
				});
			});
			// boton registrar
			});
	</script>
	<style>
	</style>
</head>
<body>
	<div class="container-fluid fondonegro">
		<div class="row">
			<div class="col-3 fondonegro borde1">
				<div class="container">

				</div>
			</div>
	<div class="col-4 borde1 mgtop" >
		<ul class="navbar" style="margin-top:12px;">
		<li class="nav-item dropdown">
			<a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			Mis viajes
			</a>
			<div class="dropdown-menu fondonegro">
				<a href="guia_misviajes.php">Próximos viajes</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			Bitácora
			</a>
			<div class="dropdown-menu fondonegro">
				<a href="guia_escribirbitacora.php">Escribir en bitácora</a>
				<a href="guia_mibitacora.php">Mi bitácora</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		Modificar
			</a>
			<div class="dropdown-menu fondonegro">
				<a href="guia_modificar.php">Modificar perfil</a>
				<a href="guia_modificar_p.php">Modificar contraseña</a>
			</div>
		</li>
		</ul>
	</div>
	<div class="col-5 borde1" style="padding:25px;">
		<form action="p_cerrarsesionguia.php">
			<button type="submit" class ="btn - btn-warning">Cerrar sesion</button>
		</form>
	</div>
	</div>
	</div>
	<div class="col-12 contentainer-fluid " style="height:900px; ">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-4 containerpadre contenedortr" style="margin-top:10px;">
				<div id="tabla_mostrar_guias">
					<h1>Lista de inscritos</h1>
					<?php
					include "conexion.php";
					$id_viaje = $_POST['viaje_id'];
					$query = "SELECT * FROM usuarios_viaje WHERE n_viaje = '$id_viaje'";
					$ejecutar = mysqli_query($conexion, $query);

					while ($row = mysqli_fetch_row($ejecutar)) {
						$queryuser = "SELECT * FROM t_usuario WHERE id_usuario='$row[1]'";
						$queryejecutar = mysqli_query($conexion, $queryuser);
						$row1 = mysqli_fetch_row($queryejecutar);
						$nombreuser = $row1[2];
						$apellidouser = $row1[3];
						$estadopago = $row[3];
						$viaje = $row[3];
					echo "<table class='table'>
					<tr>
						<td><p>Nombre: $nombreuser $apellidouser</p></td>
						<td><p>Estado pago: $estadopago</p></td>
						<td>
						<form action='usuario_vercuestionaroguia.php' method='POST'>
						<input type='hidden' value='$row[1]' id='idu' name='idu' />
						<input type='submit' value='Ver cuestionario' name ='btnR'id='btnR'()'>
						</form>
						</td>
					</tr>
					</table>";
					}
					 ?>
					<input type='button' value='Volver' name ='btnR'id='btnR' onclick='volverGuiaViajes()'>
				</div>
			</div>
			<div class="col-2"></div>
		</div>
					<div class="cargando1" id="cargando1" style='display: none'>
					</div>
</body>
</html>
