<script>

  function funciona(){
    alert("Funciona el script");
  }

  function errorIngreso(){
    alert("Error al ingresar datos");
  }

  function exito(){
    alert("Noticia agregada correctamente");
  }

  function camposVacios(){
    alert("No pueden haber campos vacíos");
  }
  function noImagen(){
    alert("Debe subir una imagen");
  }
</script>
<script src="js/funciones3.js"></script>
<?php
    include 'conexion.php';

    $titulo = $_POST['txtNoticia'];
    $fecha = $_POST['txtFecha'];
    $contenido = $_POST['txtContenido'];
    $imagen = $_FILES['imagennoticia'];

    $nombreArchivo1 = $_FILES['imagennoticia']['tmp_name'];

    if (empty($nombreArchivo1)) {
      echo "<script>noImagen()</script>";
      exit;
    }

    if (trim($titulo)==""||trim($fecha)==""||trim($contenido)=="") {
      echo "<script>camposVacios()</script>";
      exit;
    }


    $nom_random = rand(1, 10000);
    $ruta1= "fotosnoticia/".$nom_random.".jpg";
    move_uploaded_file($imagen["tmp_name"], $ruta1);

    $insertar = "INSERT INTO t_noticia(titulo_noticia,fecha_noticia,contenido_noticia,imagen_noticia) VALUES ('$titulo',
      '$fecha','$contenido','$ruta1')";
    $resultado = mysqli_query($conexion,$insertar);

    if (!$insertar) {
      echo "<script>errorIngreso()</script>";
    }
    else{
      echo "<script>exito()</script>";
    }

 ?>
