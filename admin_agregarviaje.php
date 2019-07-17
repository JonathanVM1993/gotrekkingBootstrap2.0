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
		<div class="col-12 contentainer-fluid " >
			<div class="row">
				<div class="col-12 col-xl-4 d-xs-none"></div>
				<div class="col-12 col-xl-4 col-xs-12 contenedortrp" style="margin-top:50px;">
					<div id="agregarviaje" class="agregarviaje">
			    	<form action="p_agregarviaje.php" name="formularioviaje" id="formularioviaje" enctype="multipart/form-data" method="post">
							<table>
		            <tr>
		              <td><p>Nombre viaje:</p></td>
		              <td><input type="text" class="sinborde" id="txtNombre" name="txtNombre" onkeypress="return sololetras(event)" onpaste="return false"></td>
		            </tr>
		            <tr>
		              <td><p>Fecha viaje:</p></td>
		              <td><input value="aa-mm-dd" type="datetime" class="sinborde" id="txtFecha" name="txtFecha" maxlength="10" onkeypress="return soloFecha(event)" onpaste="return false"></td>
		            </tr>
		            <tr>
		              <td><p>Seleccionar guía:</p></td>
		              <td>
		                <select name="id" id="id">
		                  <option value="0" selected>Eligir guia</option>
		                  <?php
		                  include "conexion.php";
		                $query = "SELECT * from t_guia_trekking";
		                $mostrar = mysqli_query($conexion,$query);

		                  while ($row=mysqli_fetch_array($mostrar))
		                    {?>
		                    <option value="<?php echo "$row[0]";?>"><?php echo "$row[1] $row[2]"?></option>
		                    <?php } ?>
		                </select>

		              </td>
		            </tr>
		            <tr>
		              <td><p>Imagen 1:</p></td>
		              <td><input class="sinborde" type="file" name="img1"  id="img1"></td>
		            </tr>
		            <tr>
		              <td><p>Imagen 2:</p></td>
		              <td><input class="sinborde" type="file" name="img2"  id="img2"></td>
		            </tr>
		            <tr>
		              <td><p>Imagen 3:</p></td>
		              <td><input class="sinborde" type="file" name="img3"  id="img3"></td>
		            </tr>
		            <tr>
		              <td><p>Imagen Google Maps:</p></td>
		              <td><input class="sinborde" type="file" name="img4"  id="img4"></td>
		            </tr>
		            <tr>
		              <td><p>Imagen 5:</p></td>
		              <td><input class="sinborde" type="file" name="img5"  id="img5"></td>
		            </tr>
		            <tr>
		              <td><p>Imagen 6:</p></td>
		              <td><input class="sinborde" type="file" name="img6"  id="img6"></td>
		            </tr>
		            <tr>
		              <td><p>Imagen 7:</p></td>
		              <td><input class="sinborde" type="file" name="img7"  id="img7"></td>
		            </tr>
		            <tr>
		              <td><p>Descripcion viaje:</p></td>
		              <td><textarea name="txtDescripcion" id="txtDescripcion"  cols="30" rows="10" onkeypress="return soloTextoGrande(event)"></textarea>
		              </td>
		            </tr>
		            <tr>
		              <td><p>Ubicación:</p></td>
		              <td><input class="sinborde" type="text" name="txtUbicacion"  id="txtUbicacion" onkeypress="return soloTextoGrande(event)" onpaste="return false"></td>
		            </tr>
		            <tr>
		              <td><p>Nivel viaje:</p></td>
		              <td>
		                <select value="0" name="id_nivel" id="id_nivel">
		                <option>Seleccione nivel</option>
		                <?php
		                include "conexion.php";
		              $query1 = "SELECT * from nivel_viaje";
		              $mostrar1 = mysqli_query($conexion,$query1);
		                while ($row1=mysqli_fetch_array($mostrar1))
		                  {?>
		                  <option value="<?php echo "$row1[0]";?>"><?php echo "$row1[1]"?></option>
		                  <?php } ?>
		              </select>
		              </td>
		            </tr>
		            <tr>
		              <td><p>Precio viaje:</p></td>
		              <td><input class="sinborde" type="text" name="txtPrecio"  id="txtPrecio" onkeypress="return soloDinero(event)" onpaste="return false"></td>
		            </tr>
		            <tr>
		              <td><p>Ingrese hora reunion:</p></td>
		              <td><input class="sinborde" type="text" name="txtHora"  id="txtHora" onkeypress="return soloHora(event)" onpaste="return false"></td>
		            </tr>
		            <tr>
		              <td><input type="submit" value="Agregar" name ="btnR"id="btnR"></td>
		            </tr>

		          </table>
			    	</form>
						<button onclick="volverPaneldeAdmin()">Volver</button>
			    </div>
				</div>
				<div class="col-12 col-xl-4 d-xs-none"></div>
			</div>
		</div>
			<div class="cargando1" id="cargando1" style='display: none'>
					</div>
		</div>
	</div>
</body>
</html>
