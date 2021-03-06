<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="../funciones/estilo.css">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php
$usuario = $_SESSION['username'];
?>

<form class="form-inline" method="post" enctype="multipart/form-data">

  <div class="input-group mb-2 mr-sm-4">
    <label>
      <h6>Buscar articulos por categoria:</h6>
    </label>
  </div>
  <div class="input-group mb-2 mr-sm-4">
    <select name="ropa" class="custom-select">
      <option value="camiseta">Camiseta</option>
      <option value="pantalones">Pantalones</option>
      <option value="sudadera">Sudadera</option>
      <option value="zapatillas">Zapatillas</option>
      <option value="accesorio">Accesorio</option>
    </select>
  </div>

  <button type="submit" class="boton2 mb-2" name="buscar"><i class="fas fa-arrow-right"></i></button>

</form>
<hr>

<div class="main">
  <ul class="cards">
    <?php
    if (isset($_POST['buscar'])) {
      $con = mysqli_connect("localhost", "root", "", "tfg");
      $ropa = $_POST['ropa'];
      $tamano = 3;
      $pagina = 1;
      $query = "SELECT * FROM imagenes where usuario='" . $usuario . "' and categoria='" . $ropa . "'";
      $res = mysqli_query($con, $query);
      while ($row = mysqli_fetch_assoc($res)) {
    ?>
        <li class="cards_item">
          <div class="card">
            <div class="card_image"><img data-toggle="modal" data-target="#modal1" class="img-fluid z-depth-1" src="data:<?php echo $row['tipo']; ?>;base64,<?php echo  base64_encode($row['imagen']); ?>" data-target="#indicators" data-slide-to="0" alt="" /></div>
            <div class="card_content">
              <a type="button" class="botona card_btn" href="../ropa/add_fav.php?id=<?php echo $row['id']; ?>">Me gusta</a>
              <a type="button" class="botona card_btn" href="../ropa/eliminar_img.php?id=<?php echo $row['id']; ?>">Eliminar</a>
            </div>
          </div>
        </li>
      <?php
      }
    } else {
      ?>
      <?php
      $con = mysqli_connect("localhost", "root", "", "tfg");
      $query = "SELECT * FROM imagenes where usuario='" . $usuario . "'";
      $res = mysqli_query($con, $query);
      while ($row = mysqli_fetch_assoc($res)) {
      ?>
        <li class="cards_item">
          <div class="card">
            <div class="card_image"><img data-toggle="modal" data-target="#modal1" class="img-fluid z-depth-1" src="data:<?php echo $row['tipo']; ?>;base64,<?php echo  base64_encode($row['imagen']); ?>" data-target="#indicators" data-slide-to="0" alt="" /></div>
            <div class="card_content">
              <form action="../ropa/add_calendario.php?id=<?php echo $row['id']; ?>" method="POST">
                <input type="date" id="cal" name="fecha">
                <button type="submit" class="botona card_btn" name="anadir"> <i class="fas fa-arrow-right"></i></button>
              </form>
              <a type="button" class="botona card_btn" href="../ropa/add_fav.php?id=<?php echo $row['id']; ?>">Me gusta</a>
              <a type="button" class="botona card_btn" href="../ropa/eliminar_img.php?id=<?php echo $row['id']; ?>">Eliminar</a>
            </div>
          </div>
        </li>
    <?php
      }
    }
    ?>
    <?php
    if (isset($_POST['adfav'])) {
      $add = mysqli_query($conexion, "INSERT INTO amigos (de,para,fecha,estado) values ('" . $usuario . "','$u',now(),'0')");
      if ($add) {
        echo '<script>window.location="perfil.php?usuario=' . $u . '&privada=' . $priv . '"</script>';
      }
    }
    ?>

    <?php
    if (isset($_POST['quitarfav'])) {
      $add = mysqli_query($conexion, "DELETE FROM amigos WHERE de = '$u' AND para = '" . $usuario . "' OR de = '" . $usuario . "' AND para = '$u'");
      if ($add) {
        echo '<script>window.location="perfil.php?usuario=' . $u . '&privada=' . $priv . '"</script>';
      }
    }
    ?>
  </ul>

</div>