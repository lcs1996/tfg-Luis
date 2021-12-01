<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="../funciones/estilo.css" rel="stylesheet" type="text/css">
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.  5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="../funciones/icons.js"></script>
    <title></title>
</head>
<?php
session_start();
$usuario = $_SESSION['username'];
?>

<body>

    <nav class="navbar navbar-expand-lg navbar-light blue fixed-top">
        <button id="sidebarCollapse" class="btn navbar-btn">
            <i class="fas fa-lg fa-bars"></i>
        </button>
        <div class="navbar-brand ">
            <form class="form-inline" action="menu_usuarios.php" method="POST">
                <label class="sr-only" for="inlineFormInputGroupUsername2"></label>
                <div class="input-group mb-2 mr-sm-2">
                    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="usuario" placeholder="Buscar amigos...">
                </div>
                <button type="submit" class="btn btn-secondary mb-2" name="enviar"><i class="fas fa-paper-plane"></i></button>
            </form>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" id="link" href="menu_acercade.php">
                        <i class="fas fa-info"></i>
                        Acerca de<span class="sr-only">(current) </span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" id="link" href="ajustes.php">
                        <i class="fas fa-user-cog"></i>
                        Ajustes<span class="sr-only">(current) </span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" id="link" href="../logica/salir.php">
                        <i class="fas fa-sign-out-alt"></i>
                        Cerrar Sesión<span class="sr-only">(current) </span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="wrapper fixed-left">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h7><i class="fas fa-user"></i><?php echo "$usuario" ?></h7>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="../index.php"><i class="fas fa-home"></i>Inicio</a>
                </li>
                <li>
                    <a href="menu_favs.php"><i class="fas fa-star"></i>Favoritos</a>
                </li>
                <li>
                    <a href="menu_calendario.php"><i class="fas fa-calendar"></i>Calendario</a>
                </li>
                <li>
                    <a onclick="openForm()" href="#"><i class="fas fa-upload"></i>Upload</a>
                </li>
                <li>
                    <a onclick="openForm2()" href="#"><i class="fas fa-upload"></i>Solicitudes de amistad</a>
                </li>
            </ul>
        </nav>
        <div id="content">
            <?php


            ?>
            <div id="accordion">

                <div class="card">
                    <div class="card-header">
                        <a class="card-link " data-toggle="collapse" href="#collapseOne">
                            Privacidad y seguridad
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <label for="">
                                <h6>Cambio de contraseña: </h6>
                            </label>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <div class="form-group">
                                    <div class="col-12">
                                        <label for="contra">Antigua contraseña: </label>
                                        <input type="password" id="contra" name="contra">
                                    </div>
                                    <div class="col-12">
                                        <label for="nueva">Nueva contraseña: </label>
                                        <input type="password" id="nueva" name="nueva">
                                    </div>
                                    <div class="col-12">
                                        <label for="repite">Repite contraseña: </label>
                                        <input type="password" id="repite" name="repite">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="boton" name="cambiar"> cambiar</button>
                                </div>
                            </form>
                            <?php
                            require '../logica/conexion.php';
                            if (isset($_REQUEST['cambiar'])) {
                                if ($_POST['nueva'] == $_POST['repite']) {

                                    $usuario = $_SESSION['username'];

                                    $antigua = $_POST['contra'];
                                    $nueva = $_POST['nueva'];

                                    $query = "UPDATE usuarios set contrasena='$nueva' 
                where usuario='$usuario' and contrasena='$antigua'";
                                    $resultado = mysqli_query($conexion, $query);
                                    if ($resultado) {

                            ?>
                                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                            Contraseña cambiada!
                                        </div>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                            Perfil Privado/publico
                        </a>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <?php
                            $usuario = $_SESSION['username'];
                            $query = "SELECT privada FROM usuarios WHERE usuario='$usuario'";
                            $resultado = $conexion->query($query);
                            while ($row = mysqli_fetch_assoc($resultado)) {
                                if ($row['privada'] == 0) {
                            ?>
                                    <div class="row">
                                        <div class="col">
                                            <div class='float-left'>
                                                <h6>Perfil publico</h6>
                                            </div>

                                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                                <div class="float-right">
                                                    <button type="submit" class="boton" name="cambiar2">Cambiar a
                                                        privado</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($_REQUEST['cambiar2'])) {
                                        $usuario = $_SESSION['username'];
                                        $query = "UPDATE usuarios set privada=1 
                                    where usuario='$usuario'";
                                        $res = mysqli_query($conexion, $query);
                                        if ($res) {

                                    ?>
                                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                                El perfil ha pasado a ser privado
                                            </div>
                                    <?php
                                        }
                                    }
                                } elseif ($row['privada'] == 1) {
                                    ?>
                                    <div class="row">
                                        <div class="col">
                                            <div class='float-left'>
                                                <h6>Perfil privado</h6>
                                            </div>

                                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                                <div class="float-right">
                                                    <button type="submit" class="boton" name="cambiar2">Cambiar a
                                                        publico</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($_REQUEST['cambiar2'])) {
                                        $usuario = $_SESSION['username'];
                                        $query = "UPDATE usuarios set privada=0 
                                    where usuario='$usuario'";
                                        $res = mysqli_query($conexion, $query);
                                        if ($res) {

                                    ?>
                                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                                El perfil ha pasado a ser publico
                                            </div>
                            <?php
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <footer>
        <?php require('footer.php') ?>
    </footer>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="../funciones/script.js"></script>

</body>

</html>