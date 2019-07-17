<?php

$conexion = mysqli_connect("localhost:3306","gotrekki_bd","_zOLDY8GMu1I","gotrekki_proyecto");

// Check connection
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>
