<script>
  function funciona(){
    alert("Contraseña cambiada con exito");
  }

  function noFunciona(){
    alert("Error al cambiar contraseña");
  }

  function igualAnterior(){
    alert("No puede ingresar la misma contraseña anterior");
  }

  function campoVacio(){
    alert("Debe escribir una contraseña");
  }

</script>

<?php

require_once('p_isLogin.php');
include 'conexion.php';



$pass = $_POST['txtPassword'];

if (empty($pass)) {
  echo "<script>campoVacio()</script>";
  exit;
}

$verificarp = "SELECT password,id_usuario FROM t_usuario WHERE password ='$pass' and id_usuario='$getId'";
$ejecutarveri = mysqli_query($conexion, $verificarp);

if (mysqli_fetch_array($ejecutarveri)>0) {
  echo "<script>igualAnterior()</script>";
  exit;
}

$queryp = "UPDATE t_usuario SET password='$pass' WHERE id_usuario='$getId'";
$ejecutar = mysqli_query($conexion, $queryp);

if (!$ejecutar) {
  echo "<script>noFunciona()</script>";
}
else{
  echo "<script>funciona()</script>";
}

 ?>
