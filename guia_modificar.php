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
	<link rel="stylesheet" href="css/styleb10.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:700&display=swap" rel="stylesheet">
	<script src="js/jqueryajax.js"></script>
	<script src="js/funciones23.js"></script>
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
			<div class="dropdown-menu fondonegro" style="padding:10px;">
				<a href="guia_modificar.php">Modificar perfil</a>
				<a href="guia_modificar_p.php">Contraseña</a>
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
  	<div class="col-12 contentainer-fluid ">
      <div class="row">
        <div class="col-12 col-xl-4 d-xs-none"></div>
      <div class="col-12 col-xl-4 col-xs-12 contenedortrp" style="margin-top:50px;">
          <h1>Modifica aquí tu perfil de guía:</h1>
          <form action="p_modificar_guia.php" name="modificarg" id="modificarg" enctype="multipart/form-data" method="post">
            <table>
          <tr>
            <td>Nombre:</td>
            <td><input type="text" id="txtNombre" name="txtNombre" onkeypress="return sololetras(event)" onpaste="return false"></td>
          </tr>
          <tr>
            <td>Apellido paterno:</td>
            <td><input type="text" id="txtApellidoP" name="txtApellidoP" onkeypress="return sololetras(event)" onpaste="return false"></td>
          </tr>
          <tr>
            <td>Apellido materno:</td>
            <td><input type="text" id="txtApellidoM" name="txtApellidoM" onkeypress="return sololetras(event)" onpaste="return false"></td>
          </tr>
          <tr>
            <td>Rut:</td>
            <td><input type="text" maxlength="10" id="txtRut" name="txtRut" onkeypress="return soloRut(event)" onpaste="return false"></td>
          </tr>
          <tr>
            <td>Télefono:</td>
            <td><input type="text" id="txtTelefono" name="txtTelefono" onkeypress="return soloTelefono(event)" onpaste="return false"></td>
          </tr>
          <tr>
            <td>Correo:</td>
            <td><input type="text" id="txtCorreo" name="txtCorreo" onkeypress="return soloEmail(event)" onpaste="return false"></td>
          </tr>
          <tr>
            <td><input type="button" onclick="modificarPerfilG()" value="Modificar"></td>
						<td></td>
          </tr>
          </table>
          </form>
					<button onclick="volverGuiaPerfil()">Volver</button>
        </div>
        <div class="col-12 col-xl-4 d-xs-none"></div>
      </div>
    </div>
	</div>
	<div class="cargando1" id="cargando1" style='display: none'>
	</div>
</body>
</html>
