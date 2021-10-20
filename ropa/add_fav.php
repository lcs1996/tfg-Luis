<?php
require '../logica/conexion.php';

$id = $_REQUEST['id'];
$query = "INSERT INTO img_favs (id) values ('" . $id . "')";
$resultado = $conexion->query($query);

if ($resultado) {
    header("Location: ../index.php");
} else {
    header("Location: ../index.php");
}
?>