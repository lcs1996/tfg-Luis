<?php
if (isset($_POST['anadir'])) {
    require '../logica/conexion.php';

    $id = $_REQUEST['id'];
    $fecha=$_POST['fecha'];
    $query = "INSERT INTO img_cal (id,fecha) values ('" . $id . "','" . $fecha . "')";
    $resultado = $conexion->query($query);

    if ($resultado) {
        header("Location: ../index.php");
    } else {
        header("Location: ../index.php");
    }
}


?>