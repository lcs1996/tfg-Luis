<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="../funciones/estilo.css">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php
$usuario = $_SESSION['username'];
?>
<label>
  <h6>Buscar articulos por categoria:</h6>
</label>
<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <select name="ropa" class="custom-select">
      <option value="camiseta">Camiseta</option>
      <option value="pantalones">Pantalones</option>
      <option value="sudadera">Sudadera</option>
      <option value="zapatillas">Zapatillas</option>
      <option value="accesorio">Accesorio</option>
    </select>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary" name="buscar">Búsqueda</button>
  </div>
</form>
<hr>

<div class="main">
  <ul class="cards">
    <?php
    if (isset($_POST['buscar'])) {
      $con = mysqli_connect("localhost", "root", "", "tfg");
      $ropa = $_POST['ropa'];
      $query = "SELECT * FROM imagenes where email='" . $usuario . "' and categoria='" . $ropa . "'";
      $res = mysqli_query($con, $query);
      while ($row = mysqli_fetch_assoc($res)) {
    ?>
<li class="cards_item">
          <div class="card">
            <div class="card_image"><img data-toggle="modal" data-target="#modal1" class="img-fluid z-depth-1" src="data:<?php echo $row['tipo']; ?>;base64,<?php echo  base64_encode($row['imagen']); ?>" data-target="#indicators" data-slide-to="0" alt="" /></div>
            <div class="card_content">
            <a type="button" class="boton card_btn" href="../ropa/add_fav.php?id=<?php echo $row['id']; ?>">Favorito</a>
              <a type="button" class="boton card_btn" href="../ropa/eliminar_img.php?id=<?php echo $row['id']; ?>">Eliminar</a>
            </div>
          </div>
        </li>
      <?php
      }
    } else {


      ?>
      <?php
      $con = mysqli_connect("localhost", "root", "", "tfg");
      $query = "SELECT * FROM imagenes where email='" . $usuario . "';";
      $res = mysqli_query($con, $query);
      while ($row = mysqli_fetch_assoc($res)) {
      ?>
        <li class="cards_item">
          <div class="card">
            <div class="card_image"><img data-toggle="modal" data-target="#modal1" class="img-fluid z-depth-1" src="data:<?php echo $row['tipo']; ?>;base64,<?php echo  base64_encode($row['imagen']); ?>" data-target="#indicators" data-slide-to="0" alt="" /></div>
            <div class="card_content">
            <form action="../ropa/add_calendario.php?id=<?php echo $row['id']; ?>" method="POST">
                                        <label for="cal">Fecha: </label>
                                        <input type="date" id="cal" name="fecha">
                                        <button type="submit" class="boton card_btn" name="anadir"> Añadir</button>
                                    </form>
            <a type="button" class="boton card_btn" href="../ropa/add_fav.php?id=<?php echo $row['id']; ?>">Favorito</a>
              <a type="button" class="boton card_btn" href="../ropa/eliminar_img.php?id=<?php echo $row['id']; ?>">Eliminar</a>
            </div>
          </div>
        </li>
    <?php
      }
    }
    ?>
  </ul>

</div>