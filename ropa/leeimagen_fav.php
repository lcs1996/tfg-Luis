<!doctype html>
<html lang="en">

<head>
  <title>Lee Imagen</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../funciones/estilo.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
  .close {
    font-size: 1.5rem;
  }

  .col-12 img {
    opacity: 0.7;
    cursor: pointer;
    margin: 2rem;
    width: 100%;
  }

  .col-12 img:hover {
    opacity: 1;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

  }
</style>
<?php
$usuario = $_SESSION['username'];
?>

<body>
  <div class="container">
    <div class="row d-flex flex-wrap align-items-center" data-toggle="modal" data-target="#lightbox">

      <?php

      $con = mysqli_connect("localhost", "root", "", "tfg");
      $query = "SELECT imagenes.id,imagenes.email,imagenes.nombre,imagenes.categoria,imagenes.imagen,imagenes.tipo,img_favs.id
       FROM imagenes 
       INNER JOIN img_favs
       where imagenes.email='" . $usuario . "'
       and imagenes.id=img_favs.id";
      $res = mysqli_query($con, $query);
      while ($row = mysqli_fetch_assoc($res)) {
        $tipo = $row['tipo'];
        $imagen = $row['imagen'];
      ?>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <!--Content-->
                <?php
                $conex = mysqli_connect("localhost", "root", "", "tfg");
                $consulta = "SELECT * FROM imagenes where email='" . $usuario . "';";
                $result = mysqli_query($conex, $consulta);
                while ($fil = mysqli_fetch_assoc($result)) {
                  $a = $fil['tipo'];
                  $b = $fil['imagen'];
                ?>
                  <div class="modal-content">
                    <!--Body-->
                    <div class="modal-body mb-0 p-0">
                      <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                        <img class="embed-responsive-item" src="data:<?php echo $a; ?>;base64,<?php echo  base64_encode($b); ?>"></img>
                      </div>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                      <form action="../ropa/add_calendario.php?id=<?php echo $fil['id']; ?>" method="POST">
                        <label for="cal">Fecha: </label>
                        <input type="date" id="cal" name="fecha">
                        <button type="submit" class="btn btn-primary" name="anadir"> Añadir</button>
                      </form>

                      <a type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" href="../ropa/eliminar_img.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                      <a type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" href="../ropa/add_fav.php?id=<?php echo $row['id']; ?>">Añadir favorito</a>
                      <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                <?php
                }
                ?>
                <!--/.Content-->
              </div>
            </div>
            <a><img data-toggle="modal" data-target="#modal1" class="img-fluid z-depth-1" src="data:<?php echo $tipo; ?>;base64,<?php echo  base64_encode($imagen); ?>" data-target="#indicators" data-slide-to="0" alt="" /></a>
          </div>
  <?php
      }
  ?>
  </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>