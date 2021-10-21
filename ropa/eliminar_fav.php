<?php
require '../logica/conexion.php';

$id = $_REQUEST['id'];

$query = "DELETE FROM img_favs where id ='" . $id . "'";
$resultado = $conexion->query($query);

if ($resultado) {
    header("Location: ../index.php");

} else {
    header("Location: ../index.php");
}
?>