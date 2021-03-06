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

<?php
$usuario = $_SESSION['username'];
?>

<body>

    <form class="form-inline" method="post" enctype="multipart/form-data">
    <div class="input-group mb-2 mr-sm-4">
  <label>
  <h6>Buscar por dia:</h6>
</label>
  </div>
        <div class="input-group mb-2 mr-sm-4">
            <input type="date" id="cal" name="fecha">
</div>
        
            <button type="submit" class="boton2 mb-2" name="buscar"><i class="fas fa-arrow-right"></i></button>
        
    </form>
    
    <hr>
    <div class="main">
        <ul class="cards">
            <?php
            if (isset($_POST['buscar'])) {
                $con = mysqli_connect("localhost", "root", "", "tfg");
                $fecha = $_POST['fecha'];
                $query = "SELECT imagenes.id,imagenes.usuario,imagenes.nombre,
                imagenes.categoria,imagenes.imagen,imagenes.tipo,img_cal.id
                FROM imagenes 
                INNER JOIN img_cal
                where imagenes.usuario='" . $usuario . "'
                and imagenes.id=img_cal.id
                and fecha='".$fecha."'";
                $res = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($res)) {
            ?>
                    <li class="cards_item">
                        <div class="card">
                            <div class="card_image"><img data-toggle="modal" data-target="#modal1" class="img-fluid z-depth-1" src="data:<?php echo $row['tipo']; ?>;base64,<?php echo  base64_encode($row['imagen']); ?>" data-target="#indicators" data-slide-to="0" alt="" /></div>
                            <div class="card_content">
                                <a type="button" class="botona card_btn" href="../ropa/add_fav.php?id=<?php echo $row['id']; ?>">Favorito</a>
                                <a type="button" class="botona card_btn" href="../ropa/eliminar_img.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                            </div>
                        </div>
                    </li>
            <?php
                }
            }
            ?>
        </ul>

    </div>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>