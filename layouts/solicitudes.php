<!doctype html>
<html lang="en">

<head>
    <title>Images</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../funciones/estilo.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <?php
                if (isset($_REQUEST['aceptar'])) {
                    $con = mysqli_connect("localhost", "root", "", "tfg");
                    $query = "UPDATE amigos SET estado=1";
                    $res = mysqli_query($con, $query);
                    if ($res) {
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
                }
                if (isset($_REQUEST['rechazar'])) {
                    $con = mysqli_connect("localhost", "root", "", "tfg");
                    $query = "DELETE FROM amigos where ";
                    $res = mysqli_query($con, $query);
                    if ($res) {
                ?>
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
                }
                $conexion = mysqli_connect("localhost", "root", "", "tfg");
                $cons = "SELECT id FROM usuarios where usuario= '" . $usuario . "'";
                $res = $conexion->query($cons);
                while ($a = mysqli_fetch_assoc($res)) {
                    $query = "SELECT * FROM amigos WHERE para='" . $a['id'] . "'";

                    ?>
                    <div class="form-popup" id="myForm2">
                        
                            <div class="form-group">
                                <?php
                                echo $a['de'];
                                ?>
                            </div>
                            <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <button type="submit" class="boton" name="aceptar">Aceptar</button>
                                <button type="submit" class="boton" name="rechazar">Rechazar</button>
                                <button type="button" class="btn cancel" onclick="closeForm2()">Cerrar</button>
                            </div>
                        </form>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>