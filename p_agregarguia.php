<script>
	function registroExito(){
		alert("Guia registrado con exito");
	}

	function probando(){
		alert("Verificando");
	}

	function yaRegistrado(){
		alert("Ya se encuentra un guía con este correo, intente con otro.");
	}

	function campoVacio(){
		alert("No puede dejar campos vacios");
	}

	function errorRegistro(){
		alert("No se pudo registrar el guia $nombreguia1")
	}

	function userUsado(){
		alert("El usuario del guía ya está siendo utilizado");
	}

	function camposVacios(){
		alert("No puede dejar campos vacíos");
	}

</script>
<?php
		include 'conexion.php';
		$nombre = $_POST['txtNombre'];
		$apellidopaterno = $_POST['txtApellidoP'];
		$apellidomaterno = $_POST['txtApellidoM'];
		$rut = $_POST['txtRut'];
		$telefono = $_POST['txtTelefono'];
		$correo = $_POST['txtCorreo'];
		$password = $_POST['txtPassword'];
		$userg = $_POST['txtUserG'];


		if (trim($nombre) =="" || trim($apellidopaterno) == "" || trim($apellidomaterno) == "" || trim($apellidopaterno) == "" || trim($rut)
	== "" || trim($telefono) == "" || trim($correo) == "" || trim($password) == "" || trim($userg) == ""                                     ) {
		  echo "<script>camposVacios()</script>";
			exit;
		}



		$insertar = "INSERT INTO t_guia_trekking(nom_guia,ap_p_guia,ap_m_guia,rut,telefono,correo,password,user_guia) VALUES ('$nombre','$apellidopaterno','$apellidomaterno','$rut','$telefono','$correo','$password','$userg')";

		$verificar_guia = mysqli_query($conexion,"SELECT * FROM t_guia_trekking WHERE correo = '$correo'");
		$verificar_user = mysqli_query($conexion,"SELECT * FROM t_guia_trekking WHERE user_guia='$userg'");

		if (mysqli_num_rows($verificar_user) > 0) {
			echo "<script>userUsado()</script>";
			exit;
		}


			if (mysqli_num_rows($verificar_guia) > 0) {
				echo "El usuario ya se encuentra registrado con este correo";
				echo "<script>yaRegistrado()</script>";
				exit;
			}

			$resultado = mysqli_query($conexion,$insertar);
			if (!$resultado) {
				echo 'Error al registrarse';
				echo "<script>errorRegistro()</script>";

			}
			else{
				echo "<script>registroExito()</script>";

			}
			mysqli_close($conexion);

 ?>
