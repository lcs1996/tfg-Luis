<?php
require '../logica/conexion.php';

    $para = $_REQUEST['para'];
    $idamigo=$_REQUEST['id_amigo'];
    $con = mysqli_connect("localhost", "root", "", "tfg");
    $query = "UPDATE amigos SET estado=1 where para='" . $para . "' and id_amigo='" . $idamigo . "'";
    $res = mysqli_query($con, $query);
    if ($res) {
        header("Location: ../index.php");
?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            Solicitud aceptada
        </div>
    <?php
    } else {
        header("Location: ../index.php");
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            Error <?php echo mysqli_error($con); ?>
        </div>
    <?php

    }
?>

