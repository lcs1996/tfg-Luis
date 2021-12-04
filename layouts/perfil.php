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
    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }

    </script>
    <?php
    session_start();
    $usuario = $_SESSION['username'];
    $conexion = mysqli_connect("localhost", "root", "", "tfg");
    $u=$_REQUEST['usuario'];
    $infouser = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario = '".$u."'");
    $use = mysqli_fetch_array($infouser);
  
    $amigos = mysqli_query($conexion,"SELECT * FROM amigos WHERE de = '".$u."' AND para = '".$usuario."' OR de = '".$usuario."' AND para = '".$u."'");
    $ami = mysqli_fetch_array($amigos);
    ?>
    <title>Perfil</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light blue fixed-top">
    <button id="sidebarCollapse" class="boton3 mb-2 mr-sm-2">
      <i class="fas fa-lg fa-bars"></i>
    </button>
    <div class="navbar-brand">
            <form class="form-inline" action="menu_usuarios.php" method="POST">
                <label class="sr-only" for="inlineFormInputGroupUsername2"></label>
                <div class="input-group mb-2 mr-sm-2">
                    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="usuario"
                        placeholder="Buscar amigos...">
                </div>
                <button type="submit" class="boton3 mb-2" name="enviar"><i class="fas fa-arrow-right"></i></button>
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
                    <a href="menu_solicitudes.php"><i class="fas fa-upload"></i>Solicitudes de amistad</a>
                </li>
            </ul>
        </nav>
        <div id="content">
            <div class="row">
                <div class="col">
                    <span class="float-left">
                        <img src="https://www.marinasmediterraneo.com/marinaseste/wp-content/uploads/sites/4/2018/09/generic-user-purple-4.png" class="img-circle">
                    </span>
                    <?php
                    $usu = $_REQUEST['usuario'];
                    ?>
                    <h3><?php echo $usu; ?></h3>
                    <?php if($usuario != $u) {?>
              <form action="" method="post">
              
              <?php if(mysqli_num_rows($amigos) >= 1 AND $ami['estado'] == 0) { ?>
              <h4>Esperando respuesta</h4>
              <?php } else { ?>
            <?php if($use['privada'] == 0 AND $ami['estado'] == 0) { ?>
              <input type="submit" class="btn btn-primary btn-block" name="seguir" value="Enviar solicitud de amistad">
              <?php } ?>
              <?php if($use['privada'] == 1 AND $ami['estado'] == 0) { ?>
              <input type="submit" class="btn btn-primary btn-block" name="seguir" value="Enviar solicitud de amistad">
              <?php } ?>
              <?php if($use['privada'] == 1 AND $ami['estado'] == 1) { ?>
              <input type="submit" class="btn btn-danger btn-block" name="dejarseguir" value="Dejar de seguir">
              <?php } ?>
              <?php if($use['privada'] == 0 AND $ami['estado'] == 1) { ?>
              <input type="submit" class="btn btn-danger btn-block" name="dejarseguir" value="Dejar de seguir">
              <?php } ?>


              <?php } ?>
              </form>
              <?php } ?>

              <?php
              if(isset($_POST['seguir'])) {
                $add = mysqli_query($conexion,"INSERT INTO amigos (de,para,fecha,estado) values ('".$usuario."','$u',now(),'0')");
                if($add) {echo '<script>window.location="perfil.php?usuario='.$u.'&privada='.$priv.'"</script>';}
              }
              ?>

              <?php
              if(isset($_POST['dejarseguir'])) {
                $add = mysqli_query($conexion,"DELETE FROM amigos WHERE de = '$u' AND para = '".$usuario."' OR de = '".$usuario."' AND para = '$u'");
                if($add) {echo '<script>window.location="perfil.php?usuario='.$u.'&privada='.$priv.'"</script>';}
              }
              ?>
                  
                   
                </div>
            </div>
            <hr>
            <div class="main">
                <ul class="cards">
                    <?php
                    $priv = $_REQUEST['privada'];
                    $usu=$_REQUEST['usuario'];
                    if ($priv == 0) {
                        $con = mysqli_connect("localhost", "root", "", "tfg");
                        $query = "SELECT * FROM imagenes where usuario='" . $usu . "';";
                        $res = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                            <li class="cards_item">
                                <div class="card">
                                    <div class="card_image"><img data-toggle="modal" data-target="#modal1" class="img-fluid z-depth-1" src="data:<?php echo $row['tipo']; ?>;base64,<?php echo  base64_encode($row['imagen']); ?>" data-target="#indicators" data-slide-to="0" alt="" /></div>
                                    <div class="card_content">
                                        <a type="button" class="botona card_btn" href="../ropa/eliminar_img.php?id=<?php echo $row['id']; ?>">Me gusta</a>
                                    </div>
                                </div>
                            </li>
                    <?php
                        }
                    } elseif ($priv == 1 AND $ami['estado'] == 1) {
                        
                        $con = mysqli_connect("localhost", "root", "", "tfg");
                        $query = "SELECT * FROM imagenes where usuario='" . $usu . "';";
                        $res = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                            <li class="cards_item">
                                <div class="card">
                                    <div class="card_image"><img data-toggle="modal" data-target="#modal1" class="img-fluid z-depth-1" src="data:<?php echo $row['tipo']; ?>;base64,<?php echo  base64_encode($row['imagen']); ?>" data-target="#indicators" data-slide-to="0" alt="" /></div>
                                    <div class="card_content">
                                        <a type="button" class="botona card_btn" href="../ropa/eliminar_img.php?id=<?php echo $row['id']; ?>">Me gusta</a>
                                    </div>
                                </div>
                            </li>
                    <?php
                    }
                }elseif ($priv == 1 AND $ami['estado'] == 0) {
                        echo "<h2>Este perfil es privado</h2>";
                    }
                    ?>
                </ul>
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
<?php
                   /*  $usu = $_REQUEST['usuario'];
                    ?>
                    <h3><?php echo $usu; ?></h3>
                    <span class="float-right">
                        <a class="boton" href="usu.php?usuario=<?php echo $usu; ?>">
                            Seguir
                        </a>
                    </span> */