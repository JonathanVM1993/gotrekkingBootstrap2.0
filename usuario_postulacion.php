<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/styleb11.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:700&display=swap" rel="stylesheet">
	<script src="js/jqueryajax.js"></script>
	<script src="js/funciones21.js"></script>
  <script src="js/jqueryajax.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="jquery-3.3.1.slim.min"></script>
	<script src="popper.min"></script>
	<script src="https://kit.fontawesome.com/ec482d0ef3.js"></script>
	<script>
		function irModificar(){
			location.href = "modificar_usuario.php"
		}
    function volverPerfil(){
      location.href = "usuario_perfil.php";
    }
	</script>
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
	<style type="text/css">
	</style>

	</style>
</head>
<body>
	<div class="container-fluid fondonegro ">
		<div class="row">
			<div class="col-12  col-xl-2 fondonegro borde1" >
				<div class="container ">
					<div class="row">
						<div class="col-12">
							<a href="index.php">
							<img src="img/vector-trekking.svg" style="margin-top:17px"  height="115px" width="305px">
							</a>
						</div>
					</div>
				</div>
			</div>
	<div class="col-12  col-xl-7 col-lg-4 col-md-6 d-xs-none borde1 mgtop " >
		<nav class="navbar navbar-expand-lg ">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbartoggler" aria-controls="navbartoggler" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-hiking fa-2x" style="color:white; margin-left:16px;"></i> <a href="#" style="text-decoration:none">Menú</a>
			</button>
			<div class="collapse navbar-collapse" id="navbartoggler">
	<ul class="navbar-nav fondonegro justify-content-center mr-auto mt-2 mt-md-0 mgtop " style="padding:40px" >
		<li class="nav-item active"><a href="index.php" class="nav-link ">Inicio</a></li>
		<li class="nav-item"><a href="noticias.php" class="nav-link ">Noticias</a></li>
		<li class="nav-item"><a href="usuario_viajes.php" class="nav-link">Ver viajes</a></li>
		<li class="nav-item"><a href="usuario_postulacion.php" class="nav-link bg-warning" style="color:#0f0f0f;">Postularme a guía</a></li>
		<li class="nav-item"><a href="usuario_verguias.php" class="nav-link">Conoce los guías</a></li>
	</ul>
		</div>
	</div>
	</nav>
	<div class="col-12 col-xl-3 col-lg-7 col-md-5 borde1">
		<?php
		require_once("p_isLogin.php");
		if ($estado) {
				?>
				<div class="container">
					<div class="row">
						<div class="col-4 borde1">
					</div>
						<div class="col-4 borde1">
							<ul class="navbar">
							<li class="nav-item dropdown">
								<a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<img class="rounded-circle" src="<?php echo $getFoto?>" width="100px" height="100px">
								</a>
								<div class="dropdown-menu fondonegro">
									<a class="dropdown-item" href="usuario_perfil.php">Mi perfil</a>
									<a class="dropdown-item" href="usuario_misviajes.php">Mis viajes</a>
									<a class="dropdown-item" href="modificar_usuario.php">Modificar perfil</a>
                  <a class="dropdown-item" href="usuario_modificarp.php">Cambiar contraseña</a>
									<form class="form-inline" action="p_cerrarsesion.php">
										<button type="submit" class ="btn btn-primary btn-lg" style="margin-left:5px;">Cerrar sesion</button>
										</form>
								</div>
							</li>
							</ul>
						</div>
					</div>
				</div>
				<?php
			}
			else{
				?>
				<div class="col-12 borde1" style="margin-top:38px;">

					<ul class="navbar">
					<li class="nav-item dropdown">
					<a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<i class="far fa-user fa-2x" size="9"></i> Iniciar Sesión
					</a>
<div class="dropdown-menu fondonegro">

			<form class="form-inline" name="formulario-registro" id="formulario-registro" enctype="multipart/form-data" method="post">
				<input class="" type="text" placeholder="Ingrese correo" id="txtCorreoL" name="txtCorreoL" onkeypress="return soloEmail(event)" style="margin-top:10px; margin-left:3px; border-radius: 5px;" onpaste="return false">
						<input class="" type="password" placeholder="Contraseña" id="txtContraseñaL" name="txtContraseñaL" style="margin-left:3px; margin-top:10px; border-radius:5px;" onkeypress="return soloPassword(event)" onpaste="return false">
						<input type="button" class="btn btn-outline-light " value="Iniciar sesion" id="btnIniciar" style="margin-top:10px;"></p>
						<input type="button" class="btn btn-outline-light " value= "Registrarse" onclick="irRegistrar()" style="margin-top:10px; width:132px;"></p>

</div>

			</form>
			</li>
			</ul>
			</div>
			<?php
				}?>
	</div>
	</div>
	</div>
	<div class="col-12 contentainer-fluid ">
<div class="row">
	<div class="col-12 col-xl-4 d-xs-none"></div>
	<div class="col-12 col-xl-4 col-xs-12 contenedortrp" style="margin-top:50px;">
	<?php
	require_once("p_isLogin.php");
	if (!$estado) {
		?>
				<h1>Debe estar logueado para poder postular</h1>

			<?php
		}
		else{
			?>
			<form action="p_agregarpostulacion.php" method="post" enctype="multipart/form-data">
				<h1>Por favor llene el formulario de postulación:</h1>
				<table >
					<tr>
						<td><p>Curriculum:</p></td>
						<td><input type="file" name="img"  id="img"></td>
					</tr>
					<tr>
						<td>Experiencia en trekking:</td>
						<td><textarea name="txtExperiencia" id="txtExperiencia" cols="30" rows="10" onkeypress="return soloTextoGrande(event)" onpaste="return false"></textarea></td>
					</tr>
					<tr>
						<td><input type="submit" value="Enviar postulacion"></td>
					</tr>
				</table>

			</form>
			<?php
		}?>
	</div>
	<div class="col-12 col-xl-4 d-xs-none"></div>
</div>
	</div>
					<div class="cargando1" id="cargando1" style='display: none'>
					</div>
		</div>
	</div>
	<script src="js/bootstrap.min.js"></script>
	<script src="jquery-3.3.1.slim.min"></script>
	<script src="popper.min"></script>
</body>
</html>
