<?php
    $para = $_REQUEST['para'];
    $idamigo = $_REQUEST['id_amigo'];
    $con = mysqli_connect("localhost", "root", "", "tfg");
    $query = "DELETE FROM amigos where para='" . $para . "' and id_amigo='" . $idamigo . "'";
    $res = mysqli_query($con, $query);
    if ($res) {?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            Solicitud rechazada
        </div>
    <?php
        

    } else {
        
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