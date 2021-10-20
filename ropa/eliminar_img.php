<?php
require '../logica/conexion.php';

$id=$_REQUEST['id'];

$query="DELETE FROM imagenes where id ='" . $id . "'";
$resultado=$conexion->query($query);

if ($resultado) {
    echo "Si se elimino";

}else {
    echo "No se elimino";
}
?>