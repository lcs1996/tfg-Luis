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
  <title>Armario</title>
</head>
<?php
session_start();
$usuario = $_SESSION['username'];
?>

<body>

  <nav class="navbar navbar-expand-lg navbar-light blue fixed-top">
    <!-- Expand para el menu vertical -->
    <button id="sidebarCollapse" class="boton3 mb-2 mr-sm-2">
      <i class="fas fa-lg fa-bars"></i>
    </button>
    <!-- Input de buscar amigos -->
    <div class="navbar-brand">
      <form class="form-inline" action="menu_usuarios.php" method="POST">
        <label class="sr-only" for="inlineFormInputGroupUsername2"></label>
        <div class="input-group mb-2 mr-sm-2">
          <input type="text" class="form-control" id="inlineFormInputGroupUsername2" name="usuario" placeholder="Buscar amigos...">
        </div>
        <button type="submit" class="boton3 mb-2" name="enviar"><i class="fas fa-arrow-right"></i></button>
      </form>
    </div>
    <!-- Flecha buscar -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" id="link" href="menu_solicitudes.php">
            <i class="fas fa-users"></i>
            Solicitudes de amistad
            <!-- Contador de solicitudes -->
            <?php
            require '../logica/conexion.php';
            $us = $_SESSION['username'];
            $query = "SELECT count(*) as total
        FROM amigos
        where para='$us' and estado=0";
            $resultado = $conexion->query($query);
            while ($row = mysqli_fetch_assoc($resultado)) {
              echo "(" . $row['total'] . ")";
            }
            ?>
            <span class="sr-only">(current) </span>
          </a>
        </li>
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
        <!-- Contador de amigos -->
        <?php
        require '../logica/conexion.php';
        $usu = $_SESSION['username'];
        $query = "SELECT count(*) as total
        FROM amigos
        where estado=1 AND de='$usu'";

        $qu = "SELECT count(*) as total
        FROM amigos
        where estado=1 AND para='$usu'";

        $res = $conexion->query($qu);
        $resultado = $conexion->query($query);
        while ($r = mysqli_fetch_assoc($res)) {
        while ($row = mysqli_fetch_assoc($resultado)) {
          $total=((int)$row['total']+$r['total']);
          echo "<br><i class='fas fa-user-friends'></i>Amigos: " . $total;
        }
      }
        ?>
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
      </ul>
    </nav>
    <div id="content">
      <?php
      include("../ropa/images.php");

      include("../ropa/leeimagen.php");

      ?>
    </div>
  </div>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="../funciones/script.js"></script>

</body>

</html>