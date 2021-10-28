<?php
require 'conexion.php';
session_start();
$usuario = $_SESSION['username'];

$antigua = $_POST['contra'];
$nueva = $_POST['nueva'];

$query = "UPDATE usuarios set contrasena='$nueva' 
where email='$usuario'";
$resultado = $conexion->query($query);

if ($resultado) {
    echo "hecho";

} else {
    echo "no";
}
?>