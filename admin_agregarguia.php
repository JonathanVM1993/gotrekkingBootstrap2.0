<script>
	function errorSession(){
		alert("Usted no tiene permiso");
		window.location = "index.php";
	}
</script>
<?php
		require 'isLoginAdmin.php';
    include 'conexion.php';
    if (isset($_SESSION["administrador"])) {

    }
    else{
    	echo "<script>errorSession()</script>";
			exit;
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
	<link rel="stylesheet" href="css/styleb11.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:700&display=swap" rel="stylesheet">
	<script src="js/jqueryajax.js"></script>
	<script src="js/funciones21.js"></script>
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
					Agregar
					</a>
					<div class="dropdown-menu fondonegro">
						<a class="dropdown-item" href="admin_agregarguia.php">Agregar guía</a>
						<a class="dropdown-item" href="admin_agregarviaje.php">Agregar viaje</a>
						<a class="dropdown-item" href="admin_agregarnoticia.php">Agregar noticias</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					Modificar
					</a>
					<div class="dropdown-menu fondonegro">
						<a class="dropdown-item" href="modificar_noticia.php">Modificar noticias</a>
						<a class="dropdown-item" href="modificar_contraseñaadmin.php">Modificar contraseña</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				Revisar
					</a>
					<div class="dropdown-menu fondonegro">
						<a class="dropdown-item" href="admin_verguias.php">Ver guías registrados</a>
						<a class="dropdown-item" href="admin_verviajes.php">Ver viajes</a>
						<a class="dropdown-item" href="admin_revisarpostulacion.php">Revisar postulaciones</a>
					</div>
				</li>
				</ul>
			</div>
	<div class="col-5 borde1" style="padding:25px;">
		<form action="p_cerrarsesionadmin.php">
			<button type="submit" class ="btn - btn-warning">Cerrar sesion</button>
		</form>
	</div>
	</div>
	</div>
		<div class="col-12 contentainer-fluid ">
			<div class="row">
				<div class="col-12 col-xl-4 d-xs-none"></div>
				<div class="col-12 col-xl-4 col-xs-12 contenedortrp" style="margin-top:50px;">
					<div id="admin_menu" class="admin_menu">
					<h1>Registrar guía</h1>
					<form name="formularioguia" id="formularioguia" enctype="multipart/form-data" method="post">
						<table class="tablaregistrar">
							<tr>
								<td><p>Nombre guía:</p></td>
								<td><input class="sinborde"	id="txtNombre" name="txtNombre" type="text" onkeypress="return sololetras(event)" onpaste="return false"></td>
							</tr>
							<tr>
								<td><p>Apellido parterno guía:</p></td>
								<td><input class="sinborde"	id="txtApellidoP" name="txtApellidoP" type="text" onkeypress="return sololetras(event)" onpaste="return false"></td>
							</tr>
							<tr>
								<td><p>Apellido materno guía:</p></td>
								<td><input class="sinborde"	id="txtApellidoM" name="txtApellidoM" type="text" onkeypress="return sololetras(event)" onpaste="return false"></td>
							</tr>
							<tr>
								<td><p>Rut:</p></td>
								<td><input class="sinborde"	id="txtRut" name="txtRut" type="text" onkeypress="return soloRut(event)" onpaste="return false"></td>
							</tr>
							<tr>
								<td><p>Teléfono:</p></td>
								<td><input class="sinborde"	id="txtTelefono" name="txtTelefono" type="text" onkeypress="return soloTelefono(event)" onpaste="return false"></td>
							</tr>
							<tr>
								<td><p>Correo:</p></td>
								<td><input class="sinborde"	id="txtCorreo" name="txtCorreo" type="text" onkeypress="return soloEmail(event)" onpaste="return false"></td>
							</tr>
							<tr>
								<td><p>Password:</p></td>
								<td><input class="sinborde"	id="txtPassword" name="txtPassword" type="password" onkeypress="return soloPassword(event)" onpaste="return false"></td>
							</tr>
							<tr>
								<td><p>Usuario del guía:</p></td>
								<td><input class="sinborde"	id="txtUserG" name="txtUserG" type="text" onkeypress="return soloPassword(event)" onpaste="return false"></td>
							</tr>
							<tr>
						<td><input type="button" class= "bubbly-button" value="Registrar" name ="btnR"id="btnR" onclick="registrar_guia()"></td>
							</tr>
							<td><input type="button" class= "bubbly-button" value="Volver" name ="btnR"id="btnR" onclick="volver_panel()" ></td>
						</table>
					</form>

				</div></div>
				<div class="col-12 col-xl-4 d-xs-none"></div>
			</div>
				<div class="cargando1" id="cargando1" style='display: none'>
				</div>
		</div>
	</div>
</body>
</html>
